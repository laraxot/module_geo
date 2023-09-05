<?php

declare(strict_types=1);

namespace Modules\Geo\Models\Panels;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Cms\Models\Panels\XotBasePanel;
use Modules\PFed\Models\Municipality;

/**
 * Class MunicipalityPanel.
 *
 * Modules\PFed\Models\Panels\MunicipalityPanel.
 *
 * @property Model $row
 */
class MunicipalityPanel extends XotBasePanel
{
    public $row;
    /**
     * The model the resource corresponds to.
     */
    public static string $model = 'Municipality';

    /**
     * The single value that should be used to represent the resource when being displayed.
     */
    public static string $title = 'title';

    /**
     * on select the option label.
     *
     * @param Municipality $row
     */
    public function optionLabel($row): string
    {
        return $row->name.'';
    }

    /**
     * index navigation.
     */
    public function indexNav(): ?Renderable
    {
        return null;
    }

    /**
     * Build an "index" query for the given resource.
     *
     * @param RowsContract $query
     *
     * @return RowsContract
     */
    public function indexQuery(array $data, $query)
    {
        return $query;
    }

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
                'type' => 'Text',
                'name' => 'code',
                'col_size' => 5,
            ],
            (object) [
                'type' => 'Text',
                'name' => 'name',
                'col_size' => 5,
            ],
            (object) [
                'type' => 'Text',
                'name' => 'foreign_name',
                'col_size' => 5,
            ],
            (object) [
                'type' => 'Text',
                'name' => 'cadastral_code',
                'col_size' => 5,
            ],
            (object) [
                'type' => 'Text',
                'name' => 'postal_code',
                'col_size' => 5,
            ],
            (object) [
                'type' => 'Text',
                'name' => 'prefix',
                'col_size' => 5,
            ],
            (object) [
                'type' => 'Text',
                'name' => 'province_name',
                'col_size' => 5,
            ],
            (object) [
                'type' => 'Text',
                'name' => 'region_name',
                'col_size' => 5,
            ],
            (object) [
                'type' => 'Text',
                'name' => 'email',
                'col_size' => 5,
            ],
            (object) [
                'type' => 'Text',
                'name' => 'certified_email',
                'col_size' => 5,
            ],
            (object) [
                'type' => 'Text',
                'name' => 'phone',
                'col_size' => 5,
            ],
            (object) [
                'type' => 'Text',
                'name' => 'fax',
                'col_size' => 5,
            ],
            (object) [
                'type' => 'Text',
                'name' => 'latitude',
                'col_size' => 5,
            ],
            (object) [
                'type' => 'Text',
                'name' => 'longitude',
                'col_size' => 5,
            ],
        ];
    }

    /**
     * Get the tabs available.
     */
    public function tabs(): array
    {
        $tabs_name = [];

        return $tabs_name;
    }

    /**
     * Get the cards available for the request.
     */
    public function cards(Request $request): array
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     */
    public function filters(Request $request = null): array
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     */
    public function lenses(Request $request): array
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     */
    public function actions(): array
    {
        return [];
    }
}
