<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_registers', function (Blueprint $table) {
            $table->id();
            $table->string('name_mm');
            $table->string('name_eng');
            $table->string('nrc_state_region');
            $table->string('nrc_township');
            $table->string('nrc_citizen');
            $table->string('nrc_number');
            $table->string('father_name_mm');
            $table->string('father_name_eng');
            $table->date('reg_date');
            $table->integer('gov_employee')->default(0);
            $table->text('certificates');
            $table->text('diplomas');
            $table->string('phone');
            $table->string('email');
            $table->string('password');
            $table->text('exp_desc');
            $table->date('renew_date')->default(null)->nullable();
            $table->integer('approve_reject_status')->default(0);
            $table->string('image')->nullable();
            $table->string('nrc_front')->nullable();
            $table->string('nrc_back')->nullable();
            $table->string('race');
            $table->string('religion');
            $table->string('date_of_birth');
            $table->string('address');
            $table->string('current_address');
            $table->string('recommend_letter')->nullable();
            $table->string('position')->nullable();
            $table->string('department')->nullable();
            $table->string('organization')->nullable();
            $table->integer('school_id')->nullable();
            $table->integer('school_type');
            $table->string('payment_method')->nullable();
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
        Schema::dropIfExists('teacher_registers');
    }
}
