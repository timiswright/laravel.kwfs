<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMachinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machines', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('customer_id');
            $table->char('serial', 5);
            $table->bigInteger('bucket_id');
            $table->bigInteger('auger_id');
            $table->bigInteger('bracket_id');
            $table->bigInteger('motor_id');
            $table->date('sold_date');
            $table->text('invoice');
            $table->text('notes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('machines');
    }
}
