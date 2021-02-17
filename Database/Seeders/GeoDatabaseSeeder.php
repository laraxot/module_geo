<?php

declare(strict_types=1);

namespace Modules\Geo\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

/**
 * Class GeoDatabaseSeeder.
 */
class GeoDatabaseSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Model::unguard();

        // $this->call("OthersTableSeeder");
    }
}