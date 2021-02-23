<<<<<<< HEAD
<?php

namespace Modules\Geo\Models\Panels;

//--- Services --

use Modules\Xot\Models\Panels\XotBasePanel;

/**
 * Class GeoNamesCapPanel
 * @package Modules\Geo\Models\Panels
 */
class GeoNamesCapPanel extends XotBasePanel {
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static string $model = 'Modules\Geo\Models\GeoNamesCap';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static string $title = 'title';

    /**
     * @return array
     */
    public function fields(): array {
        return [
        ];
    }
}
=======
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
>>>>>>> 6ab5d794940fc6a1e196f6ec040d0de450173200
