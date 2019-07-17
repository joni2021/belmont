<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('due')->unsigned();
            $table->date('payment_date');
            $table->double('amount_payable',10,2)->unsigned();
            $table->double('amount_paid',10,2)->unsigned()->nullable();
            $table->boolean('state')->default(0);
            $table->bigInteger('loans_id',false,true);

            $table->foreign('loans_id')->references('id')->on('loans');

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
        Schema::dropIfExists('payments');
    }
}
