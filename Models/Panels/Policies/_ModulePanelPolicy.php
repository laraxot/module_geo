<?php

declare(strict_types=1);

namespace Modules\Geo\Models\Panels\Policies;

<<<<<<< HEAD
use Modules\Xot\Models\Panels\Policies\XotBasePanelPolicy;

class _ModulePanelPolicy extends XotBasePanelPolicy {
    public function test(UserContract $user, PanelContract $panel) {
        return true;
    }
}
=======
use Modules\Xot\Contracts\PanelContract;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Models\Panels\Policies\XotBasePanelPolicy;

class _ModulePanelPolicy extends XotBasePanelPolicy {
    public function test(UserContract $user, PanelContract $panel): bool {
        return true;
    }
}
>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848
