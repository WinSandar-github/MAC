<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_logs', function (Blueprint $table) {
            $table->id();
            $table->string('student_info_id');
            $table->string('paymentType');
            $table->string('marchantID');
            $table->string('respCode')->default('N/A');
            $table->string('pan')->default('N/A');
            $table->string('amount');
            $table->string('invoiceNo');
            $table->string('transRef');
            $table->string('approvalCode')->default('N/A');
            $table->string('dateTime')->default('N/A');
            $table->string('status');
            $table->string('failReason')->default('N/A');
            $table->string('userDefined1')->default('N/A');
            $table->string('userDefined2')->default('N/A');
            $table->string('userDefined3')->default('N/A');
            $table->string('categroyCode')->default('N/A');
            $table->string('hashValue');
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
        Schema::dropIfExists('transaction_logs');
    }
}
