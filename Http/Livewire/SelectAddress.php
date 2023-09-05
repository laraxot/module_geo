<?php

/**
 * https://forum.laravel-livewire.com/t/wire-ignore-with-google-autocomplete/734/3.
 * $this->dispatchBrowserEvent('address:list:refresh');.
 */

declare(strict_types=1);

namespace Modules\Geo\Http\Livewire;

use Illuminate\Contracts\Support\Renderable;
use Livewire\Component;
use Modules\Cms\Actions\GetViewAction;
use Modules\Geo\Models\Municipality;
use Modules\Geo\Models\Province;

/**
 * Undocumented class.
 */
class SelectAddress extends Component
{
    public array $form_data = [];
    public array $provinces_list = [];
    public array $municipalities_list = [];

    /**
     * Mount function.
     *
     * param \Illuminate\View\ComponentAttributeBag $attributes
     * param \Illuminate\Support\HtmlString         $slot
     *
     * @return void
     */
    public function mount()
    {
        $this->provinces_list = Province::get()->pluck('name', 'name')->toArray();

        $this->form_data['province'] = reset($this->provinces_list);

        $this->provinceSelected();
    }

    public function provinceSelected()
    {
        $this->municipalities_list = Municipality::where('province_name', $this->form_data['province'])->get()->pluck('name', 'name')->toArray();
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
