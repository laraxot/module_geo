<?php

declare(strict_types=1);

namespace Modules\Geo\Models\Panels\Policies;

use Modules\Cms\Models\Panels\Policies\XotBasePanelPolicy;

/*
use Modules\Cms\Models\Panels\Policies\XotBasePanelPolicy;
se estendo
Declaration of Modules\Blog\Models\Policies\EventPolicy::index(Modules\User\Models\User $user, Modules\Blog\Models\Event $post) should be compatible with Modules\Cms\Models\Panels\Policies\XotBasePanelPolicy::index(Modules\User\Models\User $user, $post)
*/

/**
 * Class EventPanelPolicy.
 */
class EventPanelPolicy extends XotBasePanelPolicy
{
}
