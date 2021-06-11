<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyanmarCpaNonAuditForeignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('myanmar_cpa_non_audit_foreigns', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('accountancy_firm_info_id');
            $table->string('name');
            $table->string('position');
            $table->string('cpa_passed_reg_no');
            $table->string('cpa_full_reg_no');
            $table->string('public_practice_reg_no');
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
        Schema::dropIfExists('myanmar_cpa_non_audit_foreigns');
    }
}
