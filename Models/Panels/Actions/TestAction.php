<?php

declare(strict_types=1);

namespace Modules\Geo\Models\Panels\Actions;

<<<<<<< HEAD
//-------- models -----------

//-------- services --------
=======
// -------- models -----------

// -------- services --------
>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848
use Modules\Xot\Models\Panels\Actions\XotBasePanelAction;

/**
 * Class TestAction.
 */
class TestAction extends XotBasePanelAction {
<<<<<<< HEAD
    public bool $onItem = true; //onlyContainer
=======
    public bool $onItem = true; // onlyContainer
>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848

    public string $icon = '<i class="fas fa-magic"></i><i class="fas fa-map-marked-alt"></i>';

    public function handle() {
        return $this->panel->out();
    }

<<<<<<< HEAD
    //end handle
}//end class
=======
    // end handle
}// end class
>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848
