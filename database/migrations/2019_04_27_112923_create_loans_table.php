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
            $table->bigInteger('user_id',false,true);
            $table->tinyInteger('status',false,true);

            $table->date("instruction1_pay_date")->nullable();
            $table->double("instruction1_payment",10,2)->unsigned()->nullable();
            $table->tinyInteger('instruction1_amount',false,true)->nullable();
            $table->string("instruction1_order")->nullable();

            $table->date("instruction2_pay_date")->nullable();
            $table->double("instruction2_payment",10,2)->unsigned()->nullable();
            $table->tinyInteger('instruction2_amount',false,true)->nullable();
            $table->string("instruction2_order")->nullable();

            $table->date("instruction3_pay_date")->nullable();
            $table->double("instruction3_payment",10,2)->unsigned()->nullable();
            $table->tinyInteger('instruction3_amount',false,true)->nullable();
            $table->string("instruction3_order")->nullable();

            $table->date("instruction4_pay_date")->nullable();
            $table->double("instruction4_payment",10,2)->unsigned()->nullable();
            $table->tinyInteger('instruction4_amount',false,true)->nullable();
            $table->string("instruction4_order")->nullable();

            $table->date("cancellation1_pay_date")->nullable();
            $table->double("cancellation1_payment",10,2)->unsigned()->nullable();
            $table->tinyInteger('cancellation1_amount',false,true)->nullable();
            $table->string("cancellation1_order")->nullable();

            $table->date("cancellation2_pay_date")->nullable();
            $table->double("cancellation2_payment",10,2)->unsigned()->nullable();
            $table->tinyInteger('cancellation2_amount',false,true)->nullable();
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
