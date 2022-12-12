<?php

declare(strict_types=1);

namespace Modules\Geo\Models\Panels;

<<<<<<< HEAD
//--- Services --
=======
// --- Services --
>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848

use Modules\Xot\Models\Panels\XotBasePanel;

/**
 * Class GeoNamesCapPanel.
 */
class GeoNamesCapPanel extends XotBasePanel {
    /**
     * The model the resource corresponds to.
     */
    public static string $model = 'Modules\Geo\Models\GeoNamesCap';

    /**
     * The single value that should be used to represent the resource when being displayed.
     */
    public static string $title = 'title';

    public function fields(): array {
        return [
        ];
    }
}
