<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCPAFFSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_p_a_f_f_s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_info_id')->nullable();
            // $table->string('profile_photo')->nullable();
            $table->string('cpa')->nullable();
            $table->string('ra')->nullable();
            $table->string('degree_name')->nullable();
            $table->string('degree_pass_year')->nullable();
            $table->string('foreign_degree')->nullable();
            $table->string('pass_batch_no')->nullable();
            $table->string('pass_personal_no')->nullable();
            $table->string('qt_pass_date')->nullable();
            $table->string('qt_pass_seat_no')->nullable();
            // $table->boolean('cpa_part_2')->default(0);
            // $table->boolean('qt_pass')->default(0);
            $table->string('cpa_certificate')->nullable();
            $table->string('mpa_mem_card')->nullable();
            $table->string('mpa_mem_card_back')->nullable();
            // $table->string('nrc_front')->nullable();
            // $table->string('nrc_back')->nullable();
            $table->string('cpd_record')->nullable();
            // $table->string('passport_image');
            $table->date('accepted_date')->default(null)->nullable();
            $table->boolean('status')->default(0);
            $table->string('renew_file')->default(null)->nullable();
            $table->string('renew_micpa')->default(null)->nullable();
            $table->string('renew_cpd')->default(null)->nullable();
            $table->string('renew_cpaff_reg')->default(null)->nullable();
            $table->string('renew_accepted_date')->default(null)->nullable();
            $table->boolean('renew_status')->default(null)->nullable();
            // $table->foreign('student_info_id')->references('id')->on('student_infos')->onDelete('cascade');

            //adding for other
            $table->string('total_hours')->nullable();          
            $table->string('cpa2_pass_date')->nullable();          
            $table->string('cpaff_pass_date')->nullable();          
            $table->string('cpaff_renew_date')->nullable();          
            $table->string('cpaff_reg_no')->nullable();          
            $table->string('country')->nullable();          
            $table->string('government')->nullable();          
            $table->string('exam_year')->nullable();          
            $table->string('exam_month')->nullable();          
            $table->string('roll_no')->nullable();
            $table->string('cpa_batch_no')->nullable();
            // $table->string('address')->nullable();
            // $table->string('phone')->nullable();
            $table->string('contact_mail')->nullable();
            $table->string('form_type')->nullable();
            // $table->string('cpa_certificate_back')->nullable();
            $table->string('three_years_full')->nullable();
            // $table->string('letter')->nullable();
            $table->string('fine_person')->nullable();

            // $table->string('email')->nullable();
            // $table->string('name_mm')->nullable();
            // $table->string('name_eng')->nullable();
            // $table->string('nrc_state_region')->nullable();
            // $table->string('nrc_township')->nullable();
            // $table->string('nrc_citizen')->nullable();
            // $table->string('nrc_number')->nullable();
            // $table->string('father_name_mm')->nullable();
            // $table->string('father_name_eng')->nullable();
            // $table->string('gender')->nullable();

            // $table->string('payment_method')->nullable();
            // $table->string('old_card_year')->nullable();
            $table->string('renew_card_year')->nullable();
            $table->string('old_card_no')->nullable();
            $table->string('old_card_no_year')->nullable();
            $table->string('old_card_file')->nullable();
            $table->string('is_convicted')->nullable();
            $table->integer('is_renew')->nullable();
            $table->text('reject_description')->nullable();
            $table->text('self_confession')->nullable();
            $table->integer('type')->nullable();
            $table->string('reg_date')->nullable();
            $table->string('cpaff_reg_date')->nullable();
            $table->string('validate_from')->nullable();
            $table->string('validate_to')->nullable();
            $table->string('last_paid_year')->nullable();//new
            $table->string('previous_last_paid_year')->nullable();//new
            $table->string('resign')->nullable();//new
            $table->string('resign_date')->nullable();//new
            // $table->string('end_date')->nullable();//new
            $table->boolean('offline_user')->default(0);
            $table->string('papp_reg_no')->nullable();
            $table->string('papp_reg_year')->nullable();
            $table->string('cpaff_reg_year')->nullable();
            $table->string('cpa2_reg_no')->nullable();
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
        Schema::dropIfExists('c_p_a_f_f_s');
    }
}
