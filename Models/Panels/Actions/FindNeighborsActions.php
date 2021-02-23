<<<<<<< HEAD
<?php

namespace Modules\Geo\Models\Panels\Actions;

//-------- models -----------

//-------- services --------
use Modules\Xot\Models\Panels\Actions\XotBasePanelAction;

//-------- bases -----------

/**
 * Class FindNeighborsActions
 * @package Modules\Geo\Models\Panels\Actions
 */
class FindNeighborsActions extends XotBasePanelAction {
    /**
     * @var bool
     */
    public bool $onItem = true;
    /**
     * @var string
     */
    public string $icon = '<i class="fal fa-radar"></i><i class="fas fa-list-ol"></i>';

    /**
     * @return mixed
     */
    public function handle() {
        return $this->panel->view();
    }
}
=======
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
>>>>>>> 6ab5d794940fc6a1e196f6ec040d0de450173200
