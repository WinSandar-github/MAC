<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditFirmFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audit_firm_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('accountancy_firm_info_id');
            $table->text('ppa_certificate')->nullable();
            $table->text('letterhead')->nullable();
            $table->text('tax_clearance')->nullable();
            $table->text('representative')->nullable();
            $table->text('certi_or_reg')->nullable();
            $table->text('deeds_memo')->nullable();
            $table->text('certificate_incor')->nullable();
            $table->text('form6_form26_form_e')->nullable();
            $table->text('form_a1')->nullable();
            $table->text('tax_reg_certificate')->nullable();
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
        Schema::dropIfExists('audit_firm_files');
    }
}
