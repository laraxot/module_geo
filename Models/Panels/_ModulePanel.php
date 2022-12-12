<?php

declare(strict_types=1);

namespace Modules\Geo\Models\Panels;

use Modules\Xot\Models\Panels\XotBasePanel;

class _ModulePanel extends XotBasePanel {
    public function actions(): array {
        return [
            new Actions\TestAction(),
        ];
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848
