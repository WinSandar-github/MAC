<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentRegisterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_register', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_info_id');
            $table->date('date');
            $table->text('reg_reason')->nullable();
            $table->unsignedBigInteger('invoice_id');
            $table->date('invoice_date');
            $table->integer('type');
            $table->string('academic_year')->nullable();
            $table->string('direct_access_no')->nullable();
            $table->string('entry_success_no')->nullable();
            $table->string('module')->nullable();
            $table->string('batch_part_no')->nullable();
            $table->string('internship')->nullable();
            $table->string('good_behavior')->nullable();
            $table->string('no_crime')->nullable();
            $table->string('private_school_name')->nullable();
            $table->string('cpa_one_pass_date')->nullable();
            $table->string('cpa_one_access_no')->nullable();
            $table->string('cpa_one_success_no')->nullable();
            $table->integer('status');
            $table->string('form_type')->nullable();
            $table->unsignedBigInteger('mentor_id')->nullable();
            $table->unsignedBigInteger('current_check_service_id')->nullable();
            $table->string('current_check_services_other')->nullable();
            $table->string('recommend_file')->nullable();

            $table->foreign('student_info_id')->references('id')->on('student_infos')->onDelete('cascade');
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
        Schema::dropIfExists('student_register');
    }
}
