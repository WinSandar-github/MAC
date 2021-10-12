<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolRenewRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_renew_registers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('school_id');
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
            
            $table->string('type')->nullable();
            $table->string('attachment')->nullable();
            $table->text('address')->nullable();;
            $table->string('phone')->nullable();;

            $table->string('profile_photo');
            $table->string('school_name')->nullable();;
            $table->string('attend_course')->nullable();;
            $table->text('school_address')->nullable();;
            $table->string('own_type')->nullable();;
            $table->string('own_type_letter')->nullable();;
            $table->string('business_license')->nullable();;
            
            $table->string('school_location_attach')->nullable();;
            
            $table->string('sch_establish_notes_attach')->nullable();

            $table->string('email');
            
            $table->integer('approve_reject_status')->default(0);
            
            $table->date('renew_date')->default(null)->nullable();
            $table->string('payment_method')->nullable();
            $table->string('payment_date')->nullable();
            $table->text('reason')->nullable();
            $table->integer('initial_status')->default(0);
            
            $table->string('invoice_no')->nullable();
            $table->text('cessation_reason')->nullable();
            
            $table->integer('student_info_id')->nullable();
            $table->timestamps();

            $table->foreign('school_id')
            ->references('id')
            ->on('school_registers')
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
        Schema::dropIfExists('school_renew_registers');
    }
}
