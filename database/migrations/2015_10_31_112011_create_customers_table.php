<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            
            $table->increments('id');
            $table->char('title', 5);
            $table->char('fname', 50);
            $table->char('lname', 100);
            $table->char('street', 100);
            $table->char('town', 100);
            $table->char('postcode', 10);
            $table->char('email', 250);
            $table->char('phone', 15);
            $table->char('mobile', 15);
            $table->char('machine', 15);
            $table->char('machineType', 15);
            $table->char('serialNumber', 15);
            $table->char('latlng', 250);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('customers');
    }
}
