<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
//----- models -----
use Modules\Geo\Models\Place as MyModel;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreatePlacesTable.
 */
class CreatePlacesTable extends XotBaseMigration {
    /**
     * db up.
     *
     * @return void
     */
    public function up() {
        //-- CREATE --
        if (! $this->tableExists()) {
            $this->getConn()->create(
                $this->getTable(),
                function (Blueprint $table) {
                    $table->increments('id');
                    $table->nullableMorphs('post');
                    $table->text('formatted_address')->nullable();
                    $table->decimal('latitude', 15, 10)->nullable();
                    $table->decimal('longitude', 15, 10)->nullable();
                    $address_components = MyModel::$address_components;
                    foreach ($address_components as $el) {
                        if (! Schema::hasColumn($this->getTable(), $el)) {
                            $table->text($el)->nullable();
                        }
                        if (! Schema::hasColumn($this->getTable(), $el.'_short')) {
                            $table->text($el.'_short')->nullable();
                        }
                    }

                    $table->text('nearest_street')->nullable();

                    $table->string('created_by')->nullable();
                    $table->string('updated_by')->nullable();
                    $table->string('deleted_by')->nullable();
                    $table->timestamps();
                });
        }
        //-- UPDATE --
        $this->getConn()->table(
            $this->getTable(),
            function (Blueprint $table) {
                if (! $this->hasColumn('post_type')) {
                    $table->string('post_type', 50)->index()->nullable();
                }

                if (! $this->hasColumn('address')) {
                    $table->text('address')->nullable();
                }

                if (! $this->hasColumn('latitude')) {
                    $table->decimal('latitude', 15, 10)->nullable();
                    $table->decimal('longitude', 15, 10)->nullable();
                }
            });
    }
}
