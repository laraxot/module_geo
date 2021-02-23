<<<<<<< HEAD
<?php

namespace Modules\Geo\Providers;

//---- bases ----
use Modules\Xot\Providers\XotBaseServiceProvider;

/**
 * Class GeoServiceProvider
 * @package Modules\Geo\Providers
 */
class GeoServiceProvider extends XotBaseServiceProvider {
    /**
     * @var string
     */
    protected string $module_dir = __DIR__;
    /**
     * @var string
     */
    protected string $module_ns = __NAMESPACE__;
    /**
     * @var string
     */
    public string $module_name = 'geo';
}
=======
<?php

declare(strict_types=1);

namespace Modules\Geo\Providers;

//---- bases ----
use Modules\Xot\Providers\XotBaseServiceProvider;

/**
 * Class GeoServiceProvider.
 */
class GeoServiceProvider extends XotBaseServiceProvider {
    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;

    public string $module_name = 'geo';
}
>>>>>>> 6ab5d794940fc6a1e196f6ec040d0de450173200
