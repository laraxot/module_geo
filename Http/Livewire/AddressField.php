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
    public array $data = [];

    protected $listeners = ['updateFormData' => 'updateFormData'];

    public function mount(string $name, array $data)
    {
        $this->name = $name;

        $this->select_list = [];

        if ([] != $data) {
            $this->updateFormData($data);
        }

        $this->getList();
    }

    public function updateFormData(array $data)
    {
        switch ($this->name) {
            case 'country':
                $data['region'] = '';
                $data['province'] = '';
                $data['municipality'] = '';
                break;
            case 'region':
                $data['province'] = '';
                $data['municipality'] = '';
                break;
            case 'province':
                $data['municipality'] = '';
                break;
        }
        $this->form_data = array_merge($this->form_data, $data);
        $this->getList();
    }

    public function getList(array $params = [])
    {
        $models = config('morph_map');

        if (! isset($models[$this->name])) {
            throw new \Exception('Model '.$this->name.' is not existing');
        }

        $model = $models[$this->name];

        if ('country' == $this->name) {
            $this->select_list = array_merge(['' => '----'], $model::get()->pluck('name', 'name')->toArray());
        } elseif ('region' == $this->name && isset($this->form_data['country'])) {
            $this->select_list = array_merge(['' => '----'], $model::where('country', $this->form_data['country'])->get()->pluck('name', 'name')->toArray());
        } elseif ('province' == $this->name && isset($this->form_data['region'])) {
            $this->select_list = array_merge(['' => '----'], $model::where('region', $this->form_data['region'])->get()->pluck('abbreviation', 'abbreviation')->toArray());
            $this->form_data['municipality'] = '';
        } elseif ('municipality' == $this->name && isset($this->form_data['province'])) {
            $this->select_list = array_merge(['' => '----'], $model::where('province_abbreviation', $this->form_data['province'])->get()->pluck('name', 'name')->toArray());
        }
    }

    public function updated($name, $value)
    {
        $this->emit('updateFormData', $this->form_data);
        // Debugbar::info($this->form_data);
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
