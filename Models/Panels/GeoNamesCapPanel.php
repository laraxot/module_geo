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
>>>>>>> 82af299c (first)
