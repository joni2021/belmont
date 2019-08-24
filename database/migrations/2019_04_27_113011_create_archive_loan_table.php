<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArchiveLoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archive_loan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('loan_id',false,true);
            $table->bigInteger('archive_id',false,true);

            $table->foreign('loan_id')->references('id')->on('loans');
            $table->foreign('archive_id')->references('id')->on('archives');
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
        Schema::dropIfExists('archive_loans');
    }
}
