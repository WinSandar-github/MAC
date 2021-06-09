<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditTotalStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audit_total_staff', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('audit_total_staff_type_id');
            $table->unsignedBigInteger('accountancy_firm_info_id');
            $table->bigInteger('total');
            $table->string('audit_staff');
            $table->string('non_audit_staff');
            $table->timestamps();
            
            $table->foreign('audit_total_staff_type_id')
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
        Schema::dropIfExists('audit_total_staff');
    }
}
