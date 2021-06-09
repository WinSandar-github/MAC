<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNonAuditTotalStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('non_audit_total_staff', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('non_audit_total_staff_type_id');
            $table->unsignedBigInteger('accountancy_firm_info_id');
            $table->bigInteger('total');
            $table->timestamps();
            
            $table->foreign('non_audit_total_staff_type_id')
            ->references('id')
            ->on('audit_total_staff_types')
            ->onDelete('cascade');

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
        Schema::dropIfExists('non_audit_total_staff');
    }
}
