<?php

declare(strict_types=1);

namespace Modules\Geo\Models\Panels\Actions;

use Illuminate\Support\Facades\Storage;
use Modules\Geo\Transformers\GeoJsonCollection;
<<<<<<< HEAD
//-------- models -----------

//-------- services --------
=======
// -------- models -----------

// -------- services --------
>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848
use Modules\Xot\Models\Panels\Actions\XotBasePanelAction;

/**
 * Class MakeGeoJsonFileAction.
 */
class MakeGeoJsonFileAction extends XotBasePanelAction {
<<<<<<< HEAD
    public bool $onContainer = true; //onlyContainer
=======
    public bool $onContainer = true; // onlyContainer
>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848

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
<<<<<<< HEAD
            //->limit(10)
            ->get();
        $out = new GeoJsonCollection($rows);

        //debug_getter_obj(['obj'=>$out]);
        //$out=(string)$out;
=======
            // ->limit(10)
            ->get();
        $out = new GeoJsonCollection($rows);

        // debug_getter_obj(['obj'=>$out]);
        // $out=(string)$out;
>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848
        Storage::disk('public_html')->put('json/'.class_basename($model).'-geojson.json', $out->toJson());

        return $out;
    }
}
