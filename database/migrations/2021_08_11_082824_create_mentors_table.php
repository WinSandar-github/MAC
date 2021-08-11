<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMentorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mentors', function (Blueprint $table) {
            $table->id();
            $table->string('name_mm');
            $table->string('name_eng');
            $table->string('nrc_state_region');
            $table->string('nrc_township');
            $table->string('nrc_citizen');
            $table->string('nrc_number');
            $table->string('father_name_mm');
            $table->string('father_name_eng');
            $table->string('education');
            $table->string('ra_cpa_success_year');
            $table->string('ra_cpa_personal_no');
            $table->string('cpa_reg_no');
            $table->date('cpa_reg_date');
            $table->string('ppa_reg_no');
            $table->date('ppa_reg_date');
            $table->text('address');
            $table->string('phone_no');
            $table->string('email');
            $table->string('fax_no');
            $table->string('audit_firm_name');
            $table->string('audit_started_date');
            $table->string('audit_structure');
            $table->string('audit_staff_no');
            $table->string('current_check_services');
            $table->string('current_check_services_other')->nullable();
            $table->year('started_teaching_year');
            $table->bigInteger('internship_accept_no');
            $table->bigInteger('current_accept_no');
            $table->bigInteger('trained_trainees_no');
            $table->bigInteger('yearly_training');
            $table->bigInteger('training_absent');
            $table->string('training_absent_reason')->nullable();
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
        Schema::dropIfExists('mentors');
    }
}
