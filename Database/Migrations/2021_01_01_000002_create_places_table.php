<?php
/**
 * Syntax error or access violation: 1118 Row size too large. The maximum row size for the used table type, not counting BLOBs, is 8126. This includes storage overhead, check the manual. You have to change some columns to TEXT or BLOBs (SQL: alter table `places` add `address` text null).
 */

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
// ----- models -----
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
        // -- CREATE --
        $this->tableCreate(
            function (Blueprint $table) {
                $table->increments('id');
                $table->nullableMorphs('post');
                $table->text('address')->nullable();
                $table->text('formatted_address')->nullable();
                $table->decimal('latitude', 15, 10)->nullable();
                $table->decimal('longitude', 15, 10)->nullable();
                $address_components = MyModel::$address_components;
                foreach ($address_components as $el) {
                    if (! $this->hasColumn($el)) {
                        $table->text($el)->nullable();
                    }
                    if (! $this->hasColumn($el.'_short')) {
                        $table->text($el.'_short')->nullable();
                    }
                }

                $table->text('nearest_street')->nullable();

                $table->string('created_by')->nullable();
                $table->string('updated_by')->nullable();
                $table->string('deleted_by')->nullable();
                $table->timestamps();
            }
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        );
=======
            );
>>>>>>> f2b13f11 (.)
=======
        );
>>>>>>> 9de2ec4b (up)
=======
=======
>>>>>>> cd852c9 (rebase)
        );
=======
            );
>>>>>>> f2b13f1 (.)
<<<<<<< HEAD
>>>>>>> d4fc524 (rebase)
=======
=======
        );
>>>>>>> 9de2ec4 (up)
>>>>>>> cd852c9 (rebase)

        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table) {
                if (! $this->hasColumn('post_type')) {
                    $table->string('post_type', 50)->index()->nullable();
                }
                /*
                if (! $this->hasColumn('address')) {
                    $table->text('address')->nullable();
                }
                */
                if (! $this->hasColumn('latitude')) {
                    $table->decimal('latitude', 15, 10)->nullable();
                    $table->decimal('longitude', 15, 10)->nullable();
                }
            }
        );
    }
}
