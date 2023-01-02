<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            //Datos generales
            $table->enum('type',['fisica','moral']);
            $table->string('name',50)->nullable();
            $table->string('first_lastname',50)->nullable();
            $table->string('second_lastname',50)->nullable();
            $table->string('social_reason',100)->nullable();
            $table->string('rfc',50);
            $table->string('uso_cfdi',50);
            $table->enum('status',['activo','inactivo','baja']);

            //Datos de contacto
            $table->string('contact',50);
            $table->string('phone',10);
            $table->string('mobile',10);
            $table->string('email',50);
            $table->string('observations',50);
            
            //Dirección fiscal
            $table->string('country',50);
            $table->string('state',50);
            $table->string('municipality',50);
            $table->string('city',50);
            $table->string('postal_code',50);
            $table->string('suburb',50);
            $table->string('street',50);
            $table->string('ext_num',50);
            $table->string('int_num',50);
            
            

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
        Schema::dropIfExists('customers');
    }
}
