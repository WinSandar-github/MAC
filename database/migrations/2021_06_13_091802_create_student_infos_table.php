<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_infos', function (Blueprint $table) {
            $table->id();
            $table->string('name_mm')->nullable();
            $table->string('name_eng')->nullable();
            $table->string('nrc_state_region')->nullable();
            $table->string('nrc_township')->nullable();
            $table->string('nrc_citizen')->nullable();
            $table->string('nrc_number')->nullable();
            $table->string('father_name_mm')->nullable();
            $table->string('father_name_eng')->nullable();
            $table->string('race')->nullable();
            $table->string('religion')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->text('address')->nullable();
            $table->text('current_address')->nullable();
            $table->string('phone',30)->nullable();
            $table->boolean('gov_staff')->default(0)->nullable();
            $table->string('image')->nullable();
            $table->string('registration_no')->nullable();
            $table->date('date')->nullable();
            $table->boolean('approve_reject_status')->default(0)->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('direct_degree')->nullable();
            $table->string('degree_rank')->nullable();
            $table->date('degree_date')->nullable();
            $table->integer('school_id')->nullable();
            $table->integer('teacher_id')->nullable();
            $table->string('degree_certificate_image')->nullable();
            $table->unsignedBigInteger('course_type_id')->nullable();
            $table->unsignedBigInteger('accountancy_firm_info_id')->nullable();
            $table->unsignedBigInteger('mentor_id')->nullable();
            $table->foreign('course_type_id')->references('id')->on('course_types')->onDelete('cascade');
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
        Schema::dropIfExists('student_infos');
    }
}
