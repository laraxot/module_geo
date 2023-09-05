<?php

declare(strict_types=1);

namespace Modules\Geo\Models\Panels;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Cms\Models\Panels\XotBasePanel;

class RegionPanel extends XotBasePanel
{
    public $row;

    public static string $model = 'Region';

    public static string $title = 'name';

    public function optionLabel($row): string
    {
        return $row->name.'';
    }

    public function indexNav(): ?Renderable
    {
        return null;
    }

    public function indexQuery(array $data, $query)
    {
        return $query;
    }

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
                'name' => 'name',
                'col_size' => 5,
            ],
        ];
    }

    public function tabs(): array
    {
        $tabs_name = ['provinces'];

        return $tabs_name;
    }

    public function cards(Request $request): array
    {
        return [];
    }

    public function filters(Request $request = null): array
    {
        return [];
    }

    public function lenses(Request $request): array
    {
        return [];
    }

    public function actions(): array
    {
        return [];
    }
}
