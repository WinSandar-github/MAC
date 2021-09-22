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
            // $table->unsignedBigInteger('current_check_service_id');
            $table->string('current_check_service_id');
            $table->string('name_mm');
            $table->string('name_eng');
            $table->string('nrc_state_region');
            $table->string('nrc_township');
            $table->string('nrc_citizen');
            $table->string('nrc_number');
            $table->string('race');
            $table->string('religion');
            $table->string('date_of_birth');
            $table->string('father_name_mm');
            $table->string('father_name_eng');
            $table->string('education');
            $table->string('ra_cpa_success_year');
            $table->string('ra_cpa_personal_no');
            $table->string('cpa_reg_no');
            $table->string('cpa_reg_date');
            $table->string('papp_reg_no');
            $table->string('papp_reg_date');
            $table->string('papp_attachment')->nullable();
            $table->text('address');
            $table->string('phone_no');
            $table->string('m_email');
            $table->string('fax_no');
            $table->string('audit_firm_name');
            $table->string('audit_started_date');
            $table->string('audit_structure');
            $table->string('audit_staff_no');
            // $table->string('current_check_services');
            $table->string('current_check_services_other')->nullable();
            $table->string('attachment_file')->nullable();
            $table->string('experience');
            $table->string('started_teaching_year')->nullable();
            $table->bigInteger('internship_accept_no')->nullable();
            $table->bigInteger('current_accept_no')->nullable();
            $table->bigInteger('trained_trainees_no')->nullable();
            $table->boolean('repeat_yearly')->nullable();
            $table->boolean('training_absent')->nullable();
            $table->string('training_absent_reason')->nullable();
            $table->integer('status');
            $table->string('type');
            $table->string('reg_date');
            $table->string('image')->nullable();
            $table->string('nrc_front')->nullable();
            $table->string('nrc_back')->nullable();
            $table->string('renew_date')->default(null)->nullable();
            $table->timestamps();

            // $table->foreign('current_check_service_id')
            // ->references('id')
            // ->on('current_check_services')
            // ->onDelete('cascade');
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
