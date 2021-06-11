<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFirmOwnershipAuditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('firm_ownership_audits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('accountancy_firm_info_id');
            $table->string('name');
            $table->string('public_private_reg_no');
            $table->boolean('authority_to_sign');
            $table->timestamps();


             $table->foreign('accountancy_firm_info_id')
            ->references('id')
            ->on('accountancy_firm_information')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('firm_ownership_audits');
    }
}
