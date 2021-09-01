<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNonAuditFirmFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('non_audit_firm_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('accountancy_firm_info_id');
            $table->text('letterhead')->nullable();
            $table->text('passport_photo')->nullable();
            $table->text('education_certificate')->nullable();
            $table->text('owner_profile')->nullable();
            $table->text('work_exp')->nullable();
            $table->text('nrc_passport_front')->nullable();
            $table->text('nrc_passport_back')->nullable();
            $table->text('tax_clearance')->nullable();
            $table->text('permit_foreign')->nullable();
            $table->text('financial_statement')->nullable();
            // $table->text('representative')->nullable();
            $table->text('certi_or_reg')->nullable();
            $table->text('deeds_memo')->nullable();
            $table->text('certificate_incor')->nullable();
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
        Schema::dropIfExists('non_audit_firm_files');
    }
}
