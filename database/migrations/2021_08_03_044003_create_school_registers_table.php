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
            $table->string('type')->nullable();
            $table->string('attachment')->nullable();
            $table->text('address');
            $table->string('phone');

            $table->string('profile_photo');
            $table->string('school_name');
            $table->string('attend_course');
            $table->text('school_address');
            $table->string('own_type');
            $table->string('own_type_letter');
            $table->string('business_license');
            
            $table->string('school_location_attach');
            
            $table->string('sch_establish_notes_attach')->nullable();

            $table->string('email');
            $table->string('password');
            $table->integer('approve_reject_status')->default(0);
            $table->date('reg_date');
            $table->date('renew_date')->default(null)->nullable();
            $table->string('payment_method')->nullable();
            $table->string('payment_date')->nullable();
            $table->text('reason')->nullable();
            $table->integer('initial_status')->default(0);
            $table->string('renew_payment_date')->nullable();
            $table->string('invoice_no')->nullable();
            $table->text('cessation_reason')->nullable();
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
