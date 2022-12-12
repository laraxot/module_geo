<?php

declare(strict_types=1);

namespace Modules\Geo\Providers;

<<<<<<< HEAD
//--- bases ---
=======
// --- bases ---
>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848
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
