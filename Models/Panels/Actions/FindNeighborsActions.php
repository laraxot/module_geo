<?php

declare(strict_types=1);

namespace Modules\Geo\Models\Panels\Actions;

<<<<<<< HEAD
//-------- models -----------

//-------- services --------
use Modules\Xot\Models\Panels\Actions\XotBasePanelAction;

//-------- bases -----------
=======
// -------- models -----------

// -------- services --------
use Modules\Xot\Models\Panels\Actions\XotBasePanelAction;

// -------- bases -----------
>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848

/**
 * Class FindNeighborsActions.
 */
class FindNeighborsActions extends XotBasePanelAction {
    public bool $onItem = true;

    public string $icon = '<i class="fal fa-radar"></i><i class="fas fa-list-ol"></i>';

    /**
     * @return mixed
     */
    public function handle() {
        return $this->panel->view();
    }
}
