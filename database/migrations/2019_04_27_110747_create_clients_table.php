<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('last_name');
            $table->tinyInteger('dni_type_id',false,true);
            $table->bigInteger('dni', false, true)->unique();
            $table->string('address');
            $table->string('city');
            $table->string('province');
            $table->bigInteger('phone',false,true);
            $table->integer('cp',false,true);
            $table->bigInteger('cel',false,true)->unique();
            $table->bigInteger('cbu',false,true)->unique();

            $table->string('job_name');
            $table->string('job_address');
            $table->string('job_city');
            $table->string('job_province');
            $table->bigInteger('job_phone',false,true)->nullable();

            $table->foreign('dni_type_id')->references('id')->on('dni_types');
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
        Schema::dropIfExists('clients');
    }
}
