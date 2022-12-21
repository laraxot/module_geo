<?php

declare(strict_types=1);

namespace Modules\Geo\Models\Panels\Actions;

use Illuminate\Support\Facades\Storage;
use Modules\Cms\Models\Panels\Actions\XotBasePanelAction;
// -------- models -----------

// -------- services --------
use Modules\Geo\Transformers\GeoJsonCollection;

/**
 * Class MakeGeoJsonFileAction.
 */
class MakeGeoJsonFileAction extends XotBasePanelAction {
    public bool $onContainer = true; // onlyContainer

    public string $icon = '<i class="fas fa-magic"></i><i class="fas fa-map-marked-alt"></i>';

    /**
     * @return GeoJsonCollection
     */
    public function handle() {
        if (! method_exists($this->rows, 'getModel')) {
            throw new \Exception('method getModel is missing ['.__LINE__.']['.__FILE__.']');
        }
        $model = $this->rows->getModel();
        $rows = $model->where('latitude', '!=', null)
            // ->limit(10)
            ->get();
        $out = new GeoJsonCollection($rows);

        // debug_getter_obj(['obj'=>$out]);
        // $out=(string)$out;
        Storage::disk('public_html')->put('json/'.class_basename($model).'-geojson.json', $out->toJson());

        return $out;
    }
}
