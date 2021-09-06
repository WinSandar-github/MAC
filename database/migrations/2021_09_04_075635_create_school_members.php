<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolMembers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('school_id');
            $table->string('name');
            $table->string('nrc');
            $table->string('cpa_papp_no');
            $table->string('education');
            $table->string('responsibility');
            $table->string('ph_number');
            $table->string('email');
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
        Schema::dropIfExists('school_members');
    }
}
