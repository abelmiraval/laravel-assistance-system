<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*crear tablarealizar cambios*/
        Schema::create('charges',function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->text('description');/*mas grande que el string*/
            $table->timestamps();/*cuado se creo y cuando se actualizo*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*eliminar table*/
        Schema::drop('charges');
    }
}
