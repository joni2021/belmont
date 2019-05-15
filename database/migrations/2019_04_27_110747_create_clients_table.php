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
            $table->string('dni')->unique();
            $table->string('address');
            $table->string('city');
            $table->string('province');
            $table->string('phone')->nullable();
            $table->string('cp');
            $table->string('cel')->unique();
            $table->string('cbu')->unique()->nullable();

            $table->string('job_name')->nullable();
            $table->string('job_address')->nullable();
            $table->string('job_city')->nullable();
            $table->string('job_province')->nullable();
            $table->string('job_phone')->nullable();

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
