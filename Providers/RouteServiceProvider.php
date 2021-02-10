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
