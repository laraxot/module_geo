<?php

declare(strict_types=1);

namespace Modules\Geo\Models\Panels;

// --- Services --
use Modules\Cms\Models\Panels\XotBasePanel;

// ---- bases --

/**
 * Class EventPanel.
 */
class EventPanel extends XotBasePanel
{
    /**
     * The model the resource corresponds to.
     */
    protected static string $model = 'Modules\Geo\Models\Event';

    /**
     * Get the fields displayed by the resource.
     */
    public function fields(): array
    {
        return [
            (object) [
                'type' => 'Id',
                'name' => 'id',
                'col_size' => 2,
            ],
            (object) [
                // 'type' => 'DateTime2Fields',
                'type' => 'DateDateTime',
                'name' => 'date_start',
                'col_size' => 5,
            ],
            (object) [
                'type' => 'DateDateTime',
                'name' => 'date_end',
                'col_size' => 5,
            ],
            (object) [
                'type' => 'Text',
                'name' => 'post.title',
            ],
            (object) [
                'type' => 'Text',
                'name' => 'post.subtitle',
            ],
            /*
            (object) [
                'type' => 'Text', //'Html5UploadImg',
                'name' => 'image_src',
                'col_size' => 6,
                'except' => ['index'],
            ],
            */
        ];
    }
}
