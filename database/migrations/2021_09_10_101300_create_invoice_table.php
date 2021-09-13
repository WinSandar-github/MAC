<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->id();
            $table->string('pan')->nullable();
            $table->string('amount')->nullable();
            $table->string('approvalcode')->nullable();
            $table->string('tranRef')->nullable();
            $table->date('datetime')->nullable();
            $table->string('status')->nullable();
            $table->string('failReason')->nullable();
            $table->string('modifiedBy')->nullable();
            $table->string('ModifiedOn')->nullable();
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
        Schema::dropIfExists('invoice');
    }
}
