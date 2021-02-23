<<<<<<< HEAD
<?php

namespace Modules\Geo\Providers;

//--- bases ---
use Modules\Xot\Providers\XotBaseRouteServiceProvider;

/**
 * Class RouteServiceProvider
 * @package Modules\Geo\Providers
 */
class RouteServiceProvider extends XotBaseRouteServiceProvider {
    /**
     * The module namespace to assume when generating URLs to actions.
     *
     * @var string
     */
    protected string $moduleNamespace = 'Modules\Geo\Http\Controllers';
    /**
     * @var string
     */
    protected string $module_dir = __DIR__;
    /**
     * @var string
     */
    protected string $module_ns = __NAMESPACE__;
}
=======
<?php

declare(strict_types=1);

namespace Modules\Geo\Providers;

//--- bases ---
use Modules\Xot\Providers\XotBaseRouteServiceProvider;

/**
 * Class RouteServiceProvider.
 */
class RouteServiceProvider extends XotBaseRouteServiceProvider {
    /**
     * The module namespace to assume when generating URLs to actions.
     */
    protected string $moduleNamespace = 'Modules\Geo\Http\Controllers';

    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;
}
>>>>>>> 6ab5d794940fc6a1e196f6ec040d0de450173200
