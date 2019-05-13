<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('amount',10,2)->unsigned();
            $table->tinyInteger('dues')->unsigned();
            $table->tinyInteger('cft')->unsigned()->nullable();
            $table->tinyInteger('tna')->unsigned()->nullable();
            $table->tinyInteger('tem')->unsigned()->nullable();
            $table->tinyInteger('accreditation_type_id',false,true);
            $table->tinyInteger('financing_id',false,true);
            $table->bigInteger('client_id',false,true);
            $table->tinyInteger('status',false,true);

            $table->foreign('accreditation_type_id')->references('id')->on('accreditation_types');
            $table->foreign('financing_id')->references('id')->on('financing');
            $table->foreign('client_id')->references('id')->on('clients');
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
        Schema::dropIfExists('loans');
    }
}
