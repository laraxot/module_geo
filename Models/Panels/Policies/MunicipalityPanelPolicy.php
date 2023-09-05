<?php
namespace Modules\Geo\Models\Panels\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\LU\Models\User as User;
use Modules\Geo\Models\Panels\Policies\MunicipalityPanelPolicy as Post; 

use Modules\Cms\Models\Panels\Policies\XotBasePanelPermissionPolicy;

class MunicipalityPanelPolicy extends XotBasePanelPermissionPolicy {
}
