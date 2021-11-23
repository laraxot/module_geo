<?php

declare(strict_types=1);

namespace Modules\Geo\Models\Panels\Policies;

use Modules\Xot\Models\Panels\Policies\XotBasePanelPolicy;

class _ModulePanelPolicy extends XotBasePanelPolicy {
    public function test(UserContract $user, PanelContract $panel) {
        return true;
    }
}