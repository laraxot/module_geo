<?php

declare(strict_types=1);

namespace Modules\Geo\Models\Panels\Actions;

<<<<<<< HEAD
//-------- models -----------

//-------- services --------
use Modules\Xot\Models\Panels\Actions\XotBasePanelAction;
//use Modules\Xot\Services\ArrayService;
//-------- bases -----------
=======
// -------- models -----------

// -------- services --------
use Modules\Xot\Models\Panels\Actions\XotBasePanelAction;
// use Modules\Xot\Services\ArrayService;
// -------- bases -----------
>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848
use Modules\Xot\Services\ImportService;

/**
 * Class GetLatitudeLongitudeAction.
 */
class GetLatitudeLongitudeAction extends XotBasePanelAction {
<<<<<<< HEAD
    public bool $onContainer = true; //onlyContainer
=======
    public bool $onContainer = true; // onlyContainer
>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848

    public string $icon = '<i class="fas fa-magic"></i><i class="fas fa-map-marked-alt"></i>';

    public function handle(): void {
        if (! method_exists($this->rows, 'whereRaw')) {
<<<<<<< HEAD
            throw new \Exception('in ['.get_class($this->rows).'] method [whereRaw] not exists');
=======
            throw new \Exception('in ['.\get_class($this->rows).'] method [whereRaw] not exists');
>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848
        }
        // 46     Call to an undefined method object::getAttributeValue().
        // 47     Call to an undefined method object::fill().
        // 48     Call to an undefined method object::save().
        /*
        $rows = $this->rows
            ->whereRaw('latitude is null or longitude is null')
            ->inRandomOrder()
            ->get();
        */
        $rows = $this->panel->getBuilder()
            ->whereRaw('latitude is null or longitude is null')
            ->inRandomOrder()
            ->get();
        foreach ($rows as $row) {
<<<<<<< HEAD
            if (! \method_exists($row, 'getAddress')) {
                throw new \Exception('in ['.get_class($row).'] not exists [getAddress] method');
            }
            if (! is_object($row)) {
=======
            if (! method_exists($row, 'getAddress')) {
                throw new \Exception('in ['.\get_class($row).'] not exists [getAddress] method');
            }
            if (! \is_object($row)) {
>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848
                throw new \Exception('row is not an object');
            }
            //
            //  40     Call to an undefined method object::getAttributeValue().
            //  41     Call to an undefined method object::fill().
<<<<<<< HEAD
            //42     Call to an undefined method object::save().
=======
            // 42     Call to an undefined method object::save().
>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848
            //

            $address = $row->getAddress();
            try {
                $addr_arr = ImportService::getAddressFields(['address' => $address, 'id' => $row->getAttributeValue('id')]);
                $row->fill($addr_arr);
                $row->save();
            } catch (\Exception $e) {
            }
        }
<<<<<<< HEAD

        //return ArrayService::toXls(['data' => $data, 'filename' => 'test']);
=======
        $filename = 'test';
        /*
        return ArrayService::make()
            ->setArray($data)
            ->setFilename($filename)
            ->toXls();
        */
>>>>>>> 2b3acb63918214667a2bef656d1def3615e66848
    }
}
