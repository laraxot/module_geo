<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
// ----- models -----
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateMunicipalitiesTable.
 */
class CreateMunicipalitiesTable extends XotBaseMigration {
    /**
     * db up.
     *
     * @return void
     */
    public function up() {
        // -- CREATE --
        $this->tableCreate(
            function (Blueprint $table) {
                $table->increments('id');

                $table->string('code', 10);
                $table->string('name');
                $table->string('foreign_name')->nullable();
                $table->string('cadastral_code', 10);
                $table->string('postal_code', 10);
                $table->string('prefix', 10);
                $table->string('province_name');
                $table->string('country_name');
                $table->string('region_name');

                $table->string('email')->nullable();
                $table->string('certified_email');
                $table->string('phone', 20)->nullable();
                $table->string('fax', 20)->nullable();
                $table->decimal('latitude', 10, 7);
                $table->decimal('longitude', 10, 7);
                $table->string('created_by')->nullable();
                $table->string('updated_by')->nullable();
                $table->string('deleted_by')->nullable();
                $table->timestamps();
            }
        );

        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table) {
                if (! $this->hasColumn('country_name')) {
                    $table->text('country_name');
                }
                if (! $this->hasColumn('province_abbreviation')) {
                    $table->text('province_abbreviation');
                }

                $table->text('certified_email')->nullable()->change();

                $table->string('prefix', 10)->nullable()->change();
            }
        );
    }
}
