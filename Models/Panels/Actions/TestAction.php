<?php

declare(strict_types=1);

namespace Modules\Geo\Models\Panels\Actions;

// -------- models -----------

// -------- services --------
use Modules\Cms\Models\Panels\Actions\XotBasePanelAction;

/**
 * Class TestAction.
 */
class TestAction extends XotBasePanelAction
{
    public bool $onItem = true; // onlyContainer

    public string $icon = '<i class="fas fa-magic"></i><i class="fas fa-map-marked-alt"></i>';

    public function handle()
    {
        return $this->panel->out();
    }

    // end handle
}// end class
