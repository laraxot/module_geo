<?php

/**
 * https://forum.laravel-livewire.com/t/wire-ignore-with-google-autocomplete/734/3.
 * $this->dispatchBrowserEvent('address:list:refresh');.
 */

declare(strict_types=1);

namespace Modules\Geo\Http\Livewire;

use Livewire\Component;
use Modules\Vorrey\Models\NotServed;
use Modules\Xot\Services\ActionService;

// DA SPOSTARE NEL MODULO VORREY, insieme alla blade (nel tema vorrey)
class FormSearchAddressCategories extends Component {
    //public \Illuminate\View\ComponentAttributeBag $attributes;
    //public \Illuminate\Support\HtmlString $slot;
    public string $name = 'address';
    public array $form_data = [];

    public bool $showActivityTypes = false;
    public array $enabledTypes = [];
    public bool $warningSuggestedAddresses = false;
    public bool $warningCivicNumber = false;

    public string $email = '';
    public string $cap = '';

    public function mount($attributes, $slot) {
        //$this->attributes = $attributes;
        //$this->slot = $slot;
        $this->form_data[$this->name] = json_encode((object) []);
        $this->form_data[$this->name.'_value'] = null; //'via roma,2,mogliano veneto';
    }

    public function render() {
        $view = 'geo::livewire.form_search_address_categories';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }

    public function search() {
        $this->warningSuggestedAddresses = false;
        $this->warningCivicNumber = false;
        $this->showActivityTypes = false;

        if (! isset($this->form_data['latlng'])) {
            $this->warningSuggestedAddresses = true;

            return;
        }

        // INSERIRE CONTROLLO
        // se inserisco solo una città senza via
        // Undefined property: stdClass::$locality

        //controllo se è stato selezionato un suggerimento di google con numero civico
        if (! isset($this->form_data['street_number'])) {
            $this->warningCivicNumber = true;

            return;
        }

        //$this->showActivityTypes = true;
        /*
        if (! isset($data->street_number)) {
            $data->street_number = $this->form_data['street_number'];
            $address = $this->formatAddress($data->street_number);
            $this->form_data[$this->name.'_value'] = $address;
        }
        */

        /*
        $ltlng = $this->form_data['latlng'];
        $city = $this->form_data['locality'];
        //dddx(['form_data' => $this->form_data]);

        $lat = $ltlng['lat'];
        $lng = $ltlng['lng'];
        //dddx(['lat' => $lat, 'lng' => $lng, 'city' => $city]);

        $this->enabledTypes = ActionService::getShopsCatsByCityLatLng($city, $lat, $lng);

        session()->put('address', $this->form_data['value']);
        */

        $this->isServed();
    }

    public function isServed() {
        $ltlng = $this->form_data['latlng'];
        $city = $this->form_data['locality'];
        //dddx(['form_data' => $this->form_data]);

        $lat = $ltlng['lat'];
        $lng = $ltlng['lng'];
        //dddx(['lat' => $lat, 'lng' => $lng, 'city' => $city]);

        if (ActionService::getShopsByCityLatLng($city, $lat, $lng)->isEmpty()) {
            $this->dispatchBrowserEvent('openModalNotServed');

            return;
        }

        $this->showActivityTypes = true;

        $this->enabledTypes = ActionService::getShopsCatsByCityLatLng($city, $lat, $lng);

        session()->put('address', $this->form_data['value']);
    }

    public function formatAddress() {
        $data = (object) $this->form_data;

        if (! isset($data->street_number)) {
            $data->street_number = '';
            $this->warningCivicNumber = true;
        }
        $val = collect([
            $data->route,
            $data->street_number,
            $data->locality,
        ])->implode(', ');

        return $val;
    }

    public function placeChanged(string $val0, string $val1) {
        $this->warningSuggestedAddresses = false;
        $this->warningCivicNumber = false;
        $this->showActivityTypes = false;

        $data = json_decode($val0, true);
        $this->form_data = array_merge($this->form_data, $data);
        $this->form_data[$this->name] = $val0;
        $this->form_data[$this->name.'_value'] = $val1;

        $val2 = $this->formatAddress();
        if (strlen($val1) < 4) {
            $this->form_data[$this->name.'_value'] = $val2;
        }
    }

    public function saveNotServed() {
        //la VALIDAZIONE rompe le scatole
        //appena inizia a validare mi scompare il modal
        /*
        $validatedData = $this->validate([
            'email' => 'required|email',
            'cap' => 'required|integer|min:5|max:5',
        ]);
        */

        //dddx([$this->email, filter_var($this->email, FILTER_VALIDATE_EMAIL)]);
        //sembra andare bene

        if (false == filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->dispatchBrowserEvent('closeModalNotServed');
            //$this->dispatchBrowserEvent('openModalWrongEmailCap');
            dddx('mail non valida');

            return;
        }

        //dddx([$this->cap, preg_match('/[a-z]/i', $this->cap)]);

        if (preg_match('/[a-z]/i', $this->cap)) {
            //dddx('it has alphabet!');
            $this->dispatchBrowserEvent('closeModalNotServed');
            //$this->dispatchBrowserEvent('openModalWrongEmailCap');

            return;
        }

        $not_served = new NotServed();
        $not_served->cap = $this->cap;
        $not_served->email = $this->email;
        //$not_served->creation_date =
        $not_served->save();

        //$this->dispatchBrowserEvent('openWrongEmailCap');
    }
}
