<?php

declare(strict_types=1);

namespace Modules\Geo\Models\Panels\Actions;

// -------- models -----------
// -------- services --------
// -------- bases -----------
use Modules\Geo\Models\Place;
use Modules\Cms\Models\Panels\Actions\XotBasePanelAction;

/**
 * Class SyncInputs.
 */
class FillplacesAction extends XotBasePanelAction {
    public bool $onContainer = true; // onlyContainer

    public string $icon = '<i class="fas fa-sync"></i>';

    public function handle() {
        Place::whereRaw('1=1')->delete();
        $rows = Place::factory()->count(10)->create();

        $rows = Place::get();
        // dddx($rows);

        return $rows->count();
    }
}
