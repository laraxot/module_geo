<?php

declare(strict_types=1);

namespace Modules\Geo\Models\Panels;

//-------- Services -----
use Modules\Xot\Models\Panels\XotBasePanel;

//---- bases --

/**
 * Class PlacePanel.
 */
class PlacePanel extends XotBasePanel {
    /**
     * The model the resource corresponds to.
     */
    protected static string $model = 'Modules\Geo\Models\Place';

    /**
     * The single value that should be used to represent the resource when being displayed.
     */
    protected static string $title = 'title';

    /**
     * The columns that should be searched.
     */
    protected static array $search = [
    ];

    /**
     * The relationships that should be eager loaded on index queries.
     *
     * @var array
     */
    public function with(): array {
        return [];
    }

    /**
     * Get the fields displayed by the resource.
     */
    public function fields(): array {
        return [
            (object) [
                'type' => 'Id',
                'name' => 'id',
            ],
            (object) [
                'type' => 'Integer',
                'name' => 'post_id',
            ],
            (object) [
                'type' => 'Text',
                'name' => 'post_type',
            ],
            (object) [
                'type' => 'String',
                'name' => 'premise',
            ],
            (object) [
                'type' => 'String',
                'name' => 'locality',
            ],
            (object) [
                'type' => 'String',
                'name' => 'postal_town',
            ],
            (object) [
                'type' => 'String',
                'name' => 'administrative_area_level_3',
            ],
            (object) [
                'type' => 'String',
                'name' => 'administrative_area_level_2',
            ],
            (object) [
                'type' => 'String',
                'name' => 'administrative_area_level_1',
            ],
            (object) [
                'type' => 'String',
                'name' => 'country',
            ],
            (object) [
                'type' => 'String',
                'name' => 'street_number',
            ],
            (object) [
                'type' => 'String',
                'name' => 'route',
            ],
            (object) [
                'type' => 'String',
                'name' => 'postal_code',
            ],
            (object) [
                'type' => 'String',
                'name' => 'googleplace_url',
            ],
            (object) [
                'type' => 'String',
                'name' => 'point_of_interest',
            ],
            (object) [
                'type' => 'String',
                'name' => 'political',
            ],
            (object) [
                'type' => 'String',
                'name' => 'campground',
            ],
            (object) [
                'type' => 'Text',
                'name' => 'latitude',
            ],
            (object) [
                'type' => 'Text',
                'name' => 'longitude',
            ],
            (object) [
                'type' => 'Text',
                'name' => 'formatted_address',
            ],
            (object) [
                'type' => 'Text',
                'name' => 'nearest_street',
            ],
        ];
    }

    /**
     * Get the actions available for the resource.
     *
     * @return array
     */
    public function actions() {
        return [];
    }
}
