<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMeasurementsToMachines extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('machines', function ($table) {
            $table->text('measurement1')->nullable()->after('invoice');
            $table->text('measurement2')->nullable()->after('measurement1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customers', function ($table) {
            $table->dropColumn('measurement1');
            $table->dropColumn('measurement2');
        });
    }
}
