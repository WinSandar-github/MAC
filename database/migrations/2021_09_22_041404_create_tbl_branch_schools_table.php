<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblBranchSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_branch_schools', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('school_id');
            $table->text('branch_school_address');
            $table->string('branch_school_attach');
            $table->string('branch_sch_own_type');
            $table->string('branch_sch_letter');
            
            $table->timestamps();
            
            $table->foreign('school_id')
            ->references('id')
            ->on('school_registers')
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
        Schema::dropIfExists('tbl_branch_schools');
    }
}
