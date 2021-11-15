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
            $table->string('date_of_birth')->nullable();
            $table->string('type')->nullable();
            $table->string('attachment')->nullable();
            $table->text('address')->nullable();
            $table->text('eng_address')->nullable();
            $table->string('phone')->nullable();

            $table->string('profile_photo');
            $table->string('school_name')->nullable();
            $table->string('attend_course')->nullable();
            $table->text('school_address')->nullable();
            $table->text('eng_school_address')->nullable();
            $table->string('own_type')->nullable();
            $table->string('own_type_letter')->nullable();
            $table->string('business_license')->nullable();
            
            $table->string('school_location_attach')->nullable();
            
            $table->string('sch_establish_notes_attach')->nullable();

            $table->string('email');
            $table->string('password')->nullable();
            $table->integer('approve_reject_status')->default(0);
            $table->date('reg_date')->nullable();
            $table->date('renew_date')->default(null)->nullable();
            $table->string('payment_method')->nullable();
            $table->string('from_valid_date')->nullable();
            $table->string('to_valid_date')->nullable();
            $table->string('s_code')->nullable();
            $table->text('reason')->nullable();
            $table->integer('initial_status')->default(0);
            
            $table->string('invoice_no')->nullable();
            $table->text('cessation_reason')->nullable();
            $table->string('cessation_date')->nullable();
            $table->integer('student_info_id')->nullable();
            $table->string('renew_school_name')->nullable();
            $table->string('renew_school_address')->nullable();
            $table->string('renew_course')->nullable();
            $table->string('school_card')->nullable();
            $table->string('regno')->nullable();

            $table->string('last_registration_fee_year')->nullable();
            $table->string('request_for_temporary_stop')->nullable();
            $table->string('from_request_stop_date')->nullable();
            $table->string('to_request_stop_date')->nullable();
            $table->string('offline_user')->nullable();
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
