<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('employees',function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('surname_paternal');
            $table->string('surname_maternal');
            $table->string('dni');
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
         Schema::drop('employees');
    }
}
