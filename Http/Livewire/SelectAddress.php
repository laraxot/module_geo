<?php

/**
 * https://forum.laravel-livewire.com/t/wire-ignore-with-google-autocomplete/734/3.
 * $this->dispatchBrowserEvent('address:list:refresh');.
 */

declare(strict_types=1);

namespace Modules\Geo\Http\Livewire;

use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Contracts\Support\Renderable;
use Livewire\Component;
use Modules\Cms\Actions\GetViewAction;
use Modules\Geo\Models\Country;
use Modules\Geo\Models\Municipality;
use Modules\Geo\Models\Province;
use Modules\Geo\Models\Region;

/**
 * Undocumented class.
 */
class SelectAddress extends Component
{
    public bool $is_with_countries = false;
    public bool $is_with_regions = false;
    public array $form_data = [];
    public array $countries_list = [];
    public array $regions_list = [];
    public array $provinces_list = [];
    public array $municipalities_list = [];
    public string $postal_code = '';

    /**
     * Mount function.
     *
     * @return void
     */
    public function mount(bool $is_with_countries = true, bool $is_with_regions = true)
    {
        $this->is_with_countries = $is_with_countries;
        $this->is_with_regions = $is_with_regions;

        if (true === $is_with_countries) {
            $this->countries_list = Country::get()->pluck('name', 'name')->toArray();

            $this->form_data['country'] = reset($this->countries_list);

            $this->countrySelected();
        } elseif (true === $this->is_with_regions) {
            $this->regions_list = Region::get()->pluck('name', 'name')->toArray();

            $this->form_data['region'] = reset($this->regions_list);

            $this->regionSelected();
        } else {
            $this->provinces_list = Province::get()->pluck('name', 'name')->toArray();

            $this->form_data['province'] = reset($this->provinces_list);

            $this->provinceSelected();
        }
    }

    public function countrySelected()
    {
        if (false === $this->form_data['country']) {
            $this->regions_list = [];
            $this->provinces_list = [];
            $this->municipalities_list = [];
            $this->form_data['country'] = '';
            $this->form_data['region'] = '';
            $this->form_data['province'] = '';
            $this->form_data['municipality'] = '';
            $this->form_data['postal_code'] = '';

            return;
        }

        $this->regions_list = Country::firstWhere('name', $this->form_data['country'])->regions->pluck('name', 'name')->toArray();

        Debugbar::info($this->form_data['country']);

        $this->form_data['region'] = reset($this->regions_list);

        $this->regionSelected();
    }

    public function regionSelected()
    {
        if (false === $this->form_data['region']) {
            $this->provinces_list = [];
            $this->municipalities_list = [];
            $this->form_data['region'] = '';
            $this->form_data['province'] = '';
            $this->form_data['municipality'] = '';
            $this->form_data['postal_code'] = '';

            return;
        }

        $this->provinces_list = Region::firstWhere('name', $this->form_data['region'])->provinces->pluck('abbreviation', 'abbreviation')->toArray();

        Debugbar::info($this->form_data['region']);

        $this->form_data['province'] = reset($this->provinces_list);

        $this->provinceSelected();
    }

    public function provinceSelected()
    {
        if (false === $this->form_data['province']) {
            $this->municipalities_list = [];
            $this->form_data['province'] = '';
            $this->form_data['municipality'] = '';
            $this->form_data['postal_code'] = '';

            return;
        }

        $this->municipalities_list = Province::firstWhere('abbreviation', $this->form_data['province'])->municipalities->pluck('name', 'name')->toArray();

        Debugbar::info($this->form_data['province']);

        $this->form_data['municipality'] = reset($this->municipalities_list);

        $this->municipalitySelected();
    }

    public function municipalitySelected()
    {
        if (false === $this->form_data['municipality']) {
            $this->form_data['municipality'] = '';
            $this->form_data['postal_code'] = '';

            return;
        }

        $municipality = Municipality::where('province_abbreviation', $this->form_data['province'])->firstWhere('name', $this->form_data['municipality']);

        Debugbar::info($this->form_data['municipality']);

        $this->form_data['postal_code'] = $municipality->postal_code;
    }

    /**
     * Undocumented function.
     */
    public function render(): Renderable
    {
        /**
         * @phpstan-var view-string
         */
        $view = app(GetViewAction::class)->execute();
        $view_params = [
            'view' => $view,
        ];

        return view($view, $view_params);
    }
}
