<?php

/**
 * https://forum.laravel-livewire.com/t/wire-ignore-with-google-autocomplete/734/3.
 * $this->dispatchBrowserEvent('address:list:refresh');.
 */

declare(strict_types=1);

namespace Modules\Geo\Http\Livewire;

use Illuminate\Support\Str;
use Livewire\Component;
use Modules\Vorrey\Models\NotServed;
use Modules\Xot\Services\ActionService;

/**
 * Undocumented class.
 */
class FormSearchAddressCategories extends Component {
    //public \Illuminate\View\ComponentAttributeBag $attributes;
    //public \Illuminate\Support\HtmlString $slot;
    public string $name = 'address';
    public array $form_data = [];

    public bool $showActivityTypes = false;
    public \Illuminate\Support\Collection $enabledTypes;
    public bool $warningSuggestedAddresses = false;
    public bool $warningCivicNumber = false;

    public string $email = '';
    public string $cap = '';

    /**
     * Mount function.
     *
     * @param \Illuminate\View\ComponentAttributeBag $attributes
     * @param \Illuminate\Support\HtmlString         $slot
     *
     * @return void
     */
    public function mount($attributes, $slot) {
        //$this->attributes = $attributes;
        //$this->slot = $slot;
        $this->form_data[$this->name] = json_encode((object) []);
        $this->form_data[$this->name.'_value'] = null;
    }

    /**
     * Undocumented function.
     *
     * @return Renderable
     */
    public function render() {
        $view = 'geo::livewire.form_search_address_categories';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }

    /**
     * Undocumented function.
     *
     * @return void
     */
    public function search() {
        $this->warningSuggestedAddresses = false;
        $this->warningCivicNumber = false;
        $this->showActivityTypes = false;

        if (! isset($this->form_data['latlng'])) {
            $this->warningSuggestedAddresses = true;

            return;
        }

        if (! isset($this->form_data['street_number'])) {
            $this->warningCivicNumber = true;

            return;
        }

        $ltlng = $this->form_data['latlng'];
        $city = $this->form_data['locality'];
        $lat = $ltlng['lat'];
        $lng = $ltlng['lng'];

        $this->enabledTypes = ActionService::getShopsCatsByCityLatLng($city, $lat, $lng);

        if ($this->enabledTypes->isEmpty()) {
            $this->dispatchBrowserEvent('openModalNotServed');

            return;
        }

        $this->showActivityTypes = true;

        session()->put('address', $this->form_data['value']);
    }

    /**
     * Undocumented function.
     */
    public function formatAddress(): string {
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

    /**
     * Undocumented function.
     *
     * @return void
     */
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

    /**
     * Undocumented function.
     *
     * @return void
     */
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

        if (false == filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            dddx('mail non valida');
        }

        //dddx([$this->cap, ctype_digit($this->cap)]);

        if (false == ctype_digit($this->cap) && 5 != Str::lenght($this->cap)) {
            dddx('cap non valido');
        }

        $not_served = new NotServed();
        $not_served->cap = $this->cap;
        $not_served->email = $this->email;
        //$not_served->creation_date =
        $not_served->save();

        //$this->dispatchBrowserEvent('openWrongEmailCap');
    }
}
