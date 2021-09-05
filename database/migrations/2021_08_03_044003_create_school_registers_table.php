<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_registers', function (Blueprint $table) {
            $table->id();
            $table->string('name_mm');
            $table->string('name_eng');
            $table->string('nrc_state_region');
            $table->string('nrc_township');
            $table->string('nrc_citizen');
            $table->string('nrc_number');
            $table->string('nrc_front');
            $table->string('nrc_back');
            $table->string('father_name_mm');
            $table->string('father_name_eng');
            $table->string('date_of_birth');
            $table->string('degree');
            $table->string('type');
            $table->string('attachment')->nullable();
            $table->text('address');
            $table->string('phone');

            $table->string('profile_photo');
            $table->string('school_name');
            $table->string('attend_course');
            $table->text('school_address');
            $table->string('own_type');
            $table->text('branch_school_address');
            $table->string('branch_sch_own_type');
            $table->string('business_license');
            $table->string('company_reg');
            $table->string('org_reg_origin_and_copy');
            $table->string('estiblisher_list_and_bio');
            $table->string('governer_list_and_bio');
            $table->string('org_member_list_and_bio');
            $table->string('teacher_list_and_bio');
            $table->string('teacher_reg_copy');
            $table->string('school_location_attach');
            $table->string('school_building_attach');
            $table->string('classroom_attach');
            $table->string('toilet_attach');
            $table->string('manage_room_attach');
            $table->string('supporting_structure_photo');
            $table->string('using_type');
            $table->string('relevant_evidence_contracts');
            $table->string('sch_establish_notes_attach');

            $table->text('school_location');
            $table->text('branch_school_location');
            $table->string('bulding_type');
            $table->string('building_measurement');
            $table->integer('floor_numbers')->default(0);
            $table->integer('classroom_number')->default(0);
            $table->string('classroom_measurement');
            $table->integer('student_num_limit')->default(0);
            $table->string('air_con');
            $table->string('toilet_type');
            $table->integer('toilet_number')->default(0);
            $table->integer('manage_room_numbers')->default(0);
            $table->string('manage_room_measurement');

            $table->string('email');
            $table->string('password');
            $table->integer('approve_reject_status')->default(0);
            $table->date('reg_date');
            $table->date('renew_date')->default(null)->nullable();
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
        Schema::dropIfExists('school_registers');
    }
}
