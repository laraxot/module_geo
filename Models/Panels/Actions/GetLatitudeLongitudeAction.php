<?php

declare(strict_types=1);

namespace Modules\Geo\Models\Panels\Actions;

// -------- models -----------

// -------- services --------
use Illuminate\Database\Eloquent\Model;
// use Modules\Xot\Services\ArrayService;
// -------- bases -----------
use Modules\Cms\Models\Panels\Actions\XotBasePanelAction;
use Modules\Xot\Services\ImportService;

/**
 * Class GetLatitudeLongitudeAction.
 */
class GetLatitudeLongitudeAction extends XotBasePanelAction
{
    public bool $onContainer = true; // onlyContainer

    public string $icon = '<i class="fas fa-magic"></i><i class="fas fa-map-marked-alt"></i>';

    public function handle(): void
    {
        if (! method_exists($this->rows, 'whereRaw')) {
            throw new \Exception('in ['.\get_class($this->rows).'] method [whereRaw] not exists');
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
        /**
         * @var Model[]
         */
        $rows = $this->panel->getBuilder()
            ->whereRaw('latitude is null or longitude is null')
            ->inRandomOrder()
            ->get();
        foreach ($rows as $row) {
            if (! method_exists($row, 'getAddress')) {
                throw new \Exception('in ['.\get_class($row).'] not exists [getAddress] method');
            }
            if (! \is_object($row)) {
                throw new \Exception('row is not an object');
            }
            //
            //  40     Call to an undefined method object::getAttributeValue().
            //  41     Call to an undefined method object::fill().
            // 42     Call to an undefined method object::save().
            //

            $address = $row->getAddress();
            try {
                $addr_arr = ImportService::make()->getAddressFields(['address' => $address, 'id' => $row->getAttributeValue('id')]);
                $row->fill($addr_arr);
                $row->save();
            } catch (\Exception $e) {
            }
        }
        $filename = 'test';
        /*
        return ArrayService::make()
            ->setArray($data)
            ->setFilename($filename)
            ->toXls();
        */
    }
}
