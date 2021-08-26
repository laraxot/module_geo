<?php

declare(strict_types=1);

namespace Modules\Geo\Models\Panels;

//--- Services --

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
