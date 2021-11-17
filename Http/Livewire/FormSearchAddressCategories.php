<?php

/**
 * https://forum.laravel-livewire.com/t/wire-ignore-with-google-autocomplete/734/3.
 * $this->dispatchBrowserEvent('address:list:refresh');.
 */

declare(strict_types=1);

namespace Modules\Geo\Http\Livewire;

use Livewire\Component;
use Modules\Xot\Services\ActionService;

class FormSearchAddressCategories extends Component {
    public $attributes;
    public $slot;
    public $name = 'address';
    public array $form_data = [];

    public bool $showActivityTypes = false;
    public array $enabledTypes = [];

    public function mount($attributes, $slot) {
        $this->streetNumberMissing = false;
        $this->attributes = (string) $attributes;
        $this->slot = (string) $slot;
        $this->form_data[$this->name] = json_encode((object) []);
        $this->form_data[$this->name.'_value'] = null; //'via roma,2,mogliano veneto';
        /*
        dddx(
            [
                //'a' => view()->composers(),
                'methods' => get_class_methods(view()),
            ]
        );
        */
    }

    public function render() {
        $this->streetNumberMissing = $this->streetNumberMissing();

        $view = 'geo::livewire.form_search_address_categories';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }

    public function streetNumberMissing() {
        //dddx($this->form_data);

        if (! empty($this->form_data['address'])) {
            $data = json_decode($this->form_data['address']);

            if (empty($data->street_number)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function search() {
        $this->showActivityTypes = true;
        $data = json_decode($this->form_data['address']);

        //dddx($data);
        $ltlng = $data->latlng;
        $city = $data->locality;
        $lat = $ltlng->lat;
        $lng = $ltlng->lng;
        //$this->enabledTypes = ActionService::getShopsCatsByLatLng($lat, $lng);
        $this->enabledTypes = ActionService::getShopsCatsByCityLatLng($city, $lat, $lng);

        $this->streetNumberMissing();

        session()->put('address', $data->value);
    }
}
