<?php

declare(strict_types=1);

namespace Modules\Geo\Models\Panels\Actions;

//-------- models -----------

//-------- services --------
use Modules\Xot\Models\Panels\Actions\XotBasePanelAction;

//-------- bases -----------

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