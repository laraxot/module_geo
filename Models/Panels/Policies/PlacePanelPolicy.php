<?php
namespace Modules\Geo\Models\Panels\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\LU\Models\User as User;
use Modules\Geo\Models\Panels\Policies\PlacePanelPolicy as Panel;

use Modules\Xot\Models\Panels\Policies\XotBasePanelPolicy;

class PlacePanelPolicy extends XotBasePanelPolicy {
}
