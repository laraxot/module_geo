<<<<<<< HEAD
<?php

declare(strict_types=1);

namespace Modules\Geo\Models\Panels\Actions;

//-------- models -----------

//-------- services --------
use Modules\Xot\Models\Panels\Actions\XotBasePanelAction;
//use Modules\Xot\Services\ArrayService;
//-------- bases -----------
use Modules\Xot\Services\ImportService;

/**
 * Class GetLatitudeLongitudeAction.
 */
class GetLatitudeLongitudeAction extends XotBasePanelAction {
    public bool $onContainer = true; //onlyContainer

    public string $icon = '<i class="fas fa-magic"></i><i class="fas fa-map-marked-alt"></i>';

    public function handle() {
        $rows = $this->rows
            ->whereRaw('latitude is null or longitude is null')
            ->inRandomOrder()
            ->get();
        foreach ($rows as $row) {
            $address = $row->getAddress();
            try {
                $addr_arr = ImportService::getAddressFields(['address' => $address, 'id' => $row->getAttributeValue('id')]);
                $row->fill($addr_arr);
                $row->save();
            } catch (\Exception $e) {
            }
        }

        //return ArrayService::toXls(['data' => $data, 'filename' => 'test']);
    }
}
=======
<?php

declare(strict_types=1);

namespace Modules\Geo\Models\Panels\Actions;

//-------- models -----------

//-------- services --------
use Modules\Xot\Models\Panels\Actions\XotBasePanelAction;
//use Modules\Xot\Services\ArrayService;
//-------- bases -----------
use Modules\Xot\Services\ImportService;

/**
 * Class GetLatitudeLongitudeAction.
 */
class GetLatitudeLongitudeAction extends XotBasePanelAction {
    public bool $onContainer = true; //onlyContainer

    public string $icon = '<i class="fas fa-magic"></i><i class="fas fa-map-marked-alt"></i>';

    public function handle() {
        $rows = $this->rows
            ->whereRaw('latitude is null or longitude is null')
            ->inRandomOrder()
            ->get();
        foreach ($rows as $row) {
            $address = $row->getAddress();
            try {
                $addr_arr = ImportService::getAddressFields(['address' => $address, 'id' => $row->getAttributeValue('id')]);
                $row->fill($addr_arr);
                $row->save();
            } catch (\Exception $e) {
            }
        }

        //return ArrayService::toXls(['data' => $data, 'filename' => 'test']);
    }
}
>>>>>>> 82af299c (first)
