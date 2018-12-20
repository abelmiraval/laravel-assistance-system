<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('schedules',function(Blueprint $table){
            $table->increments('id');
            $table->string('day');
            $table->time('hour_entry');
            $table->time('hour_departure');
            $table->integer('idcharge')->unsigned();
            $table->foreign('idcharge')->references('id')->on('charges');
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
        Schema::drop('schedules');
    }
}


// <?php

// use Illuminate\Support\Facades\Schema;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Database\Migrations\Migration;

// class CreateChargesSchedulesTable extends Migration
// {
//     /**
//      * Run the migrations.
//      *
//      * @return void
//      */
//     public function up()
//     {
//         //
//         Schema::create('charges_schedules',function(Blueprint $table){
//             $table->increments('id');
//             $table->integer('idcharge')->unsigned();
//             $table->foreign('idcharge')->references('id')->on('charges');
            
//             $table->integer('idschedule')->unsigned();
//             $table->foreign('idschedule')->references('id')->on('schedules');
            
//             $table->string('state',1);
//             $table->timestamps();

//         });
//     }

//     /**
//      * Reverse the migrations.
//      *
//      * @return void
//      */
//     public function down()
//     {
//         //
//         Schema::drop('charges_schedules');
//     }
// }
