<?php

declare(strict_types=1);

namespace Modules\Geo\Models\Panels\Actions;

<<<<<<< HEAD
//-------- models -----------
//-------- services --------
//-------- bases -----------
=======
// -------- models -----------
// -------- services --------
// -------- bases -----------
>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848
use Modules\Geo\Models\Place;
use Modules\Xot\Models\Panels\Actions\XotBasePanelAction;

/**
 * Class SyncInputs.
 */
class FillplacesAction extends XotBasePanelAction {
<<<<<<< HEAD
    public bool $onContainer = true; //onlyContainer
=======
    public bool $onContainer = true; // onlyContainer
>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848

    public string $icon = '<i class="fas fa-sync"></i>';

    public function handle() {
        Place::whereRaw('1=1')->delete();
        $rows = Place::factory()->count(10)->create();

        $rows = Place::get();
<<<<<<< HEAD
        //dddx($rows);

        return $rows->count();
    }
}
=======
        // dddx($rows);

        return $rows->count();
    }
}
>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848
