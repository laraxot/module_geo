<?php

namespace Modules\Geo\Models\Panels\Actions;

//-------- models -----------

//-------- services --------
use Modules\Xot\Models\Panels\Actions\XotBasePanelAction;

//-------- bases -----------

class FindNeighborsActions extends XotBasePanelAction {
    public $onItem = true;
    public $icon = '<i class="fal fa-radar"></i><i class="fas fa-list-ol"></i>';

    public function handle() {
        return $this->panel->view();
    }
}
