<?php

/**
 * https://forum.laravel-livewire.com/t/wire-ignore-with-google-autocomplete/734/3.
 * $this->dispatchBrowserEvent('address:list:refresh');.
 */

declare(strict_types=1);

namespace Modules\Geo\Http\Livewire;

use Livewire\Component;

class Test extends Component {
    /**
     * Lookup intermediary.
     *
     * @var
     */
    public $lookup;

    public function render() {
        $view = 'geo::livewire.test';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}