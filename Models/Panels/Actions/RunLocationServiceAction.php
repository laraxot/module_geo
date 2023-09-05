<?php

declare(strict_types=1);

namespace Modules\Geo\Models\Panels\Actions;

use Modules\Cms\Models\Panels\Actions\XotBasePanelAction;
use Modules\Geo\Services\LocationService;

class RunLocationServiceAction extends XotBasePanelAction
{
    public bool $onItem = true;

    public string $icon = 'Update Regions,Provinces, Municipalities';

    public function handle()
    {
        LocationService::make();

        return '<h1>Done</h1>';
    }
}
