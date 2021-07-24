<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCpaOneRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cpa_one_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('private_school_name')->nullable();//private school
            $table->string('academic_year');//mac / private school / self study
            $table->string('photo');//mac / private school / self study
            $table->string('name_mm');//mac / private school / self study
            $table->string('name_en');//mac / private school / self study
            $table->string('nrc_state_region')->nullable();//mac / private school / self study
            $table->string('nrc_township')->nullable();//mac / private school / self study
            $table->string('nrc_citizen')->nullable();//mac / private school / self studyc
            $table->string('nrc_number')->nullable();//mac / private school / self study
            $table->string('father_name_mm');//mac / private school / self study
            $table->string('father_name_en');//mac / private school / self study
            $table->string('race');//mac / private school / self study
            $table->string('religion');//mac / private school / self study
            $table->date('birth_date');//mac / private school / self study
            $table->string('education');//mac / private school / self study
            $table->string('position');//mac / private school / self study
            $table->string('department');//mac / private school / self study
            $table->string('office_area');//mac / private school / self study
            $table->boolean('civil_servant');//mac / private school / self study
            $table->text('address');//mac / private school / self study
            $table->text('current_address');//mac / private school / self study
            $table->string('phone');//mac / private school / self study
            $table->string('email')->nullable();// private school / self study
            $table->string('direct_access_no')->nullable();//mac / private school / self study
            $table->string('entry_success_no')->nullable();//mac / private school / self study
            $table->boolean('gov_department')->nullable();//mac
            $table->boolean('personal_acc_training')->nullable();//mac
            $table->boolean('after_second_exam')->nullable();//mac
            $table->string('good_morale_file')->nullable();//mac
            $table->string('no_crime_file')->nullable();//mac
            $table->unsignedBigInteger('module_id')->nullable();//mac /self study
           // $table->string('entrance_exam_no');
            $table->boolean('enrol_no_exam')->nullable();// self study
            $table->boolean('attendance')->nullable();// self study
            $table->boolean('fail_exam')->nullable();//self study
            $table->boolean('resigned')->nullable();//self study
           // $table->unsignedBigInteger('module_id');//self study
            $table->string('batch_session_no')->nullable();//self study
            $table->string('entrance_part')->nullable();//self study
            $table->string('entrance_exam_no')->nullable();//self study
            $table->integer('cpa_one_type');
            $table->timestamps();

            $table->foreign('module_id')
            ->references('id')
            ->on('modules')
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
        Schema::dropIfExists('cpa_one_registrations');
    }
}
