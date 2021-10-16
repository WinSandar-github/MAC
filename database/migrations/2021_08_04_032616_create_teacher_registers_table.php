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
            $table->date('reg_date')->nullable();
            $table->integer('gov_employee')->default(0);
            $table->text('certificates')->nullable();
            $table->text('diplomas')->nullable();
            $table->string('phone');
            $table->string('email');
            $table->string('password')->nullable();
            $table->text('exp_desc')->nullable();
            $table->date('renew_date')->default(null)->nullable();
            $table->integer('approve_reject_status')->default(0);
            $table->string('image')->nullable();
            $table->string('nrc_front')->nullable();
            $table->string('nrc_back')->nullable();
            $table->string('race')->nullable();
            $table->string('religion')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('address')->nullable();
            $table->string('eng_address')->nullable();
            $table->string('current_address')->nullable();
            $table->string('eng_current_address')->nullable();
            $table->string('recommend_letter')->nullable();
            $table->string('position')->nullable();
            $table->string('department')->nullable();
            $table->string('organization')->nullable();
            $table->integer('school_id')->nullable();
            $table->integer('school_type')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('from_valid_date')->nullable();
            $table->string('to_valid_date')->nullable();
            $table->string('t_code')->nullable();
            $table->text('reason')->nullable();
            $table->integer('initial_status')->default(0);
            $table->string('regno')->nullable();
            
            $table->string('invoice_no')->nullable();
            $table->text('cessation_reason')->nullable();
            $table->string('school_name')->nullable();
            $table->integer('student_info_id')->nullable();
            $table->string('teacher_card')->nullable();
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
