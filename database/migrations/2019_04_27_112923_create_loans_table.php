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
            $table->double('cft',6,2)->unsigned();
            $table->double('tna',6,2)->unsigned();
            $table->double('tem',6,2)->unsigned();
            $table->tinyInteger('accreditation_type_id',false,true);
            $table->tinyInteger('financing_id',false,true);
            $table->bigInteger('client_id',false,true);
            $table->bigInteger('user_id',false,true);
            $table->tinyInteger('status',false,true);
            $table->string("code");

            $table->double("instruction1_payment",10,2)->unsigned()->nullable();
            $table->double('instruction1_amount',10,2)->nullable();
            $table->string("instruction1_order")->nullable();

            $table->double("instruction2_payment",10,2)->unsigned()->nullable();
            $table->double('instruction2_amount',10,2)->nullable();
            $table->string("instruction2_order")->nullable();

            $table->double("instruction3_payment",10,2)->unsigned()->nullable();
            $table->double('instruction3_amount',10,2)->nullable();
            $table->string("instruction3_order")->nullable();

            $table->double("instruction4_payment",10,2)->unsigned()->nullable();
            $table->double('instruction4_amount',10,2)->nullable();
            $table->string("instruction4_order")->nullable();

            $table->double("cancellation1_payment",10,2)->unsigned()->nullable();
            $table->double('cancellation1_amount',10,2)->nullable();
            $table->string("cancellation1_order")->nullable();

            $table->double("cancellation2_payment",10,2)->unsigned()->nullable();
            $table->double('cancellation2_amount',10,2)->nullable();
            $table->string("cancellation2_order")->nullable();



            $table->foreign('accreditation_type_id')->references('id')->on('accreditation_types');
            $table->foreign('financing_id')->references('id')->on('financing');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('user_id')->references('id')->on('users');
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
