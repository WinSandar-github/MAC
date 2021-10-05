<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_info_id');
            $table->string('invoiceNo');
            $table->string('name_eng')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('amount_type')->nullable();
            $table->string('productDesc')->nullable();
            $table->string('merchantID')->nullable();
            $table->string('respCode')->nullable();
            $table->string('pan')->nullable();
            $table->string('amount')->nullable();
            $table->string('tranRef')->nullable();
            $table->string('approvalCode')->nullable();
            $table->date('dateTime')->nullable();
            $table->string('status')->nullable();
            $table->string('failReason')->nullable();
            $table->string('userDefined1')->nullable();
            $table->string('userDefined2')->nullable();
            $table->string('userDefined3')->nullable();
            $table->string('categoryCode')->nullable();
            $table->string('hashValue')->nullable();
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
        Schema::dropIfExists('invoices');
    }
}
