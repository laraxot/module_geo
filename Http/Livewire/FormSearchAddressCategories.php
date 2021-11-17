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
    public $civic_number = 'street_number';
    public array $form_data = [];

    public bool $showActivityTypes = false;
    public array $enabledTypes = [];
    public bool $warningSuggestedAddresses = false;
    public int $warningCivicNumber = 0;

    public function mount($attributes, $slot) {
        $this->attributes = (string) $attributes;
        $this->slot = (string) $slot;
        $this->form_data[$this->name] = json_encode((object) []);
        $this->form_data[$this->name.'_value'] = null; //'via roma,2,mogliano veneto';
        $this->form_data['street_number_value'] = null;
        /*
        dddx(
            [
                //'a' => view()->composers(),
                'methods' => get_class_methods(view()),
            ]
        );
        */
    }

    public function search() {
        $address = json_decode($this->form_data['address']);

        if (empty($address->street_number) && empty($this->form_data['street_number_value'])) {
            $this->warningCivicNumber = 2;
        } else {
            if (! empty($this->form_data['street_number_value'])) {
                $this->warningCivicNumber = 1;
            } else {
                $this->warningCivicNumber = 0;
            }
            $this->showActivityTypes = true;

            $ltlng = $address->latlng;
            $city = $address->locality;
            $lat = $ltlng->lat;
            $lng = $ltlng->lng;
            //$this->enabledTypes = ActionService::getShopsCatsByLatLng($lat, $lng);
            $this->enabledTypes = ActionService::getShopsCatsByCityLatLng($city, $lat, $lng);

            session()->put('address', $address->value);
        }
    }

    public function render() {
        \Debugbar::info($this);

        $view = 'geo::livewire.form_search_address_categories';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}

/*

    +"value": "Via Melegnano, Udine, UD, Italia"
    +"latlng": {#1915 ▶}
    +"route": "Via Melegnano"
    +"route_short": "Via Melegnano"
    +"locality": "Udine"
    +"locality_short": "Udine"
    +"administrative_area_level_3": "Udine"
    +"administrative_area_level_3_short": "Udine"
    +"administrative_area_level_2": "Provincia di Udine"
    +"administrative_area_level_2_short": "UD"
    +"administrative_area_level_1": "Friuli-Venezia Giulia"
    +"administrative_area_level_1_short": "Friuli-Venezia Giulia"
    +"country": "Italia"
    +"country_short": "IT"
    +"postal_code": "33100"
    +"postal_code_short": "33100"
*/

/*
    +"value": "Via Alessandro Manzoni, 5, Mogliano Veneto, TV, Italia"
    +"latlng": {#1915 ▶}
    +"street_number": "5"
    +"street_number_short": "5"
    +"route": "Via A. Manzoni"
    +"route_short": "Via A. Manzoni"
    +"locality": "Mogliano Veneto"
    +"locality_short": "Mogliano Veneto"
    +"administrative_area_level_3": "Mogliano Veneto"
    +"administrative_area_level_3_short": "Mogliano Veneto"
    +"administrative_area_level_2": "Provincia di Treviso"
    +"administrative_area_level_2_short": "TV"
    +"administrative_area_level_1": "Veneto"
    +"administrative_area_level_1_short": "Veneto"
    +"country": "Italia"
    +"country_short": "IT"
    +"postal_code": "31021"
    +"postal_code_short": "31021"
*/
