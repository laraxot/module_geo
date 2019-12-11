<?php

namespace Modules\Geo\Models\Panels\Actions;

//-------- models -----------

//-------- services --------
use Modules\Xot\Services\ArrayService;
use Modules\Xot\Services\ImportService;

//-------- bases -----------
use Modules\Xot\Models\Panels\Actions\XotBasePanelAction;


class getLatitudeLongitudeAction extends XotBasePanelAction {
    public $name = 'get_lat_lng'; //name for calling Action
    public $onContainer = true; //onlyContainer
    public $icon = '<i class="fas fa-magic"></i><i class="fas fa-map-marked-alt"></i>';

    public function handle() {
        $rows=$this->rows
        	->whereRaw('latitude is null or longitude is null')
        	->inRandomOrder()
        	->get();
        foreach($rows as $row){
        	$address=$row->getAddress();
        	$addr_arr=ImportService::getAddressFields(['address'=>$address,'id'=>$row->id]);
        	$row->fill($addr_arr);
        	$row->save();

        }
        
        //return ArrayService::toXls(['data' => $data, 'filename' => 'test']);
    }
}
