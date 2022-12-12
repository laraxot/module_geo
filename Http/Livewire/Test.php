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
<<<<<<< HEAD
     *
     * @var
=======
>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848
     */
    public $lookup;

    public function render() {
        $view = 'geo::livewire.test';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848
