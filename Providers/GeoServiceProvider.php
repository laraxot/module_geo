<?php

declare(strict_types=1);

namespace Modules\Geo\Providers;

<<<<<<< HEAD
//---- bases ----
=======
// ---- bases ----
>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848
use Modules\Xot\Providers\XotBaseServiceProvider;

/**
 * Class GeoServiceProvider.
 */
class GeoServiceProvider extends XotBaseServiceProvider {
    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;

    public string $module_name = 'geo';
}
