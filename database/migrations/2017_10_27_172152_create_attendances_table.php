<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('attendances',function(Blueprint $table){
        $table->increments('id');
        $table->date('date');
        $table->time('hour_entry');
        $table->time('hour_departure')->nullable();
        $table->time('hour_not_worked')->nullable();    
        $table->integer('idemployee')->unsigned();
        $table->foreign('idemployee')->references('id')->on('employees');
        $table->string('state',1);
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
        //
         Schema::drop('attendances');
    }
}
