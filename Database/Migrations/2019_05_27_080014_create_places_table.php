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
        //----- create -----
        if (! Schema::hasTable($this->getTable())) {
            Schema::create($this->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->nullableMorphs('post');                
                $table->string('formatted_address')->nullable();
                $table->decimal('latitude', 15, 10)->nullable();
                $table->decimal('longitude', 15, 10)->nullable();
                $address_components = MyModel::$address_components;
                foreach ($address_components as $el) {
                    if (! Schema::hasColumn($this->getTable(), $el)) {
                        $table->string($el)->nullable();
                    }
                    if (! Schema::hasColumn($this->getTable(), $el.'_short')) {
                        $table->string($el.'_short')->nullable();
                    }
                }

                $table->string('nearest_street')->nullable();

                $table->string('created_by')->nullable();
                $table->string('updated_by')->nullable();
                $table->string('deleted_by')->nullable();
                $table->timestamps();
            });
        }
        //----- update -----
        Schema::table($this->getTable(), function (Blueprint $table) {
            if (! Schema::hasColumn($this->getTable(), 'post_type')) {                
                $table->string('post_type', 50)->index()->nullable();
            }

            if (! Schema::hasColumn($this->getTable(), 'address')) {
                $table->text('address')->nullable();
            }
        });
    }

    public function down() {
        Schema::dropIfExists($this->getTable());
    }
}
