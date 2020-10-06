<?php

namespace Modules\Geo\Models\Panels\Actions;

use Illuminate\Support\Facades\Storage;

use Modules\Geo\Transformers\GeoJsonCollection;

//-------- models -----------

//-------- services --------
use Modules\Xot\Models\Panels\Actions\XotBasePanelAction;

class MakeGeoJsonFileAction extends XotBasePanelAction {
    public $onContainer = true; //onlyContainer
    public $icon = '<i class="fas fa-magic"></i><i class="fas fa-map-marked-alt"></i>';

    public function handle() {
        $model=$this->rows->getModel();
        $rows=$model->where('latitude','!=',null)
            //->limit(10)
            ->get();
        $out=new GeoJsonCollection($rows);
        ;

        //debug_getter_obj(['obj'=>$out]);
        //$out=(string)$out;
        Storage::disk('public_html')->put('json/'.class_basename($model).'-geojson.json', $out->toJson());
        return $out;
    }
}
