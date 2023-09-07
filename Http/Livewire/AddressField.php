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

/**
 * Undocumented class.
 */
class AddressField extends Component
{
    public array $form_data = [];
    public array $select_list = [];
    public string $name;

    protected $listeners = ['selected' => 'selectedListener'];

    public function mount(string $name)
    {
        $this->name = $name;

        $this->select_list = [];

        if ('country' == $name) {
            $this->getList();
            $this->form_data[$this->name] = 'Italia';
            $this->selected();
        }
    }

    public function getList($key = '', $previous = '')
    {
        $models = config('morph_map');

        if (! isset($models[$this->name])) {
            throw new \Exception('Model '.$this->name.' is not existing');
        }

        $model = $models[$this->name];

        if ('country' == $this->name) {
            $this->select_list = $model::get()->pluck('name', 'name')->toArray();
        } else {
            $this->select_list = $model::where($previous, $key)->get()->pluck('name', 'name')->toArray();
        }
    }

    public function selectedListener($params)
    {
        extract($params);

        if ($type == $this->name) {
            $this->getList($key, $previous);
        }
    }

    public function selected()
    {
        if ('country' == $this->name) {
            $nextSelect = 'region';
        } elseif ('region' == $this->name) {
            $nextSelect = 'province';
        } elseif ('province' == $this->name) {
            $nextSelect = 'municipality';
        }

        Debugbar::info($nextSelect);

        $this->emitTo('address-field', 'selected', ['previous' => $this->name, 'type' => $nextSelect, 'key' => $this->form_data[$this->name]]);
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
