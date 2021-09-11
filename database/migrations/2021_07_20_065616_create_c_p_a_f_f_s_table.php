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
            $table->unsignedBigInteger('student_info_id');
            $table->string('profile_photo')->nullable();
            $table->string('cpa')->nullable();
            $table->string('ra')->nullable();
            $table->string('degree_name')->nullable();
            $table->string('degree_pass_year')->nullable();
            $table->string('degree_file')->nullable();
            $table->string('foreign_degree')->nullable();
            $table->boolean('cpa_part_2')->default(0);
            $table->boolean('qt_pass')->default(0);
            $table->string('cpa_certificate');
            $table->string('mpa_mem_card');
            $table->string('nrc_front');
            $table->string('nrc_back');
            $table->string('cpd_record');
            $table->string('passport_image');
            $table->date('accepted_date')->default(null)->nullable();
            $table->boolean('status')->default(0);
            $table->string('renew_file')->default(null)->nullable();
            $table->string('renew_micpa')->default(null)->nullable();
            $table->string('renew_cpd')->default(null)->nullable();
            $table->string('renew_cpaff_reg')->default(null)->nullable();
            $table->date('renew_accepted_date')->default(null)->nullable();
            $table->boolean('renew_status')->default(null)->nullable();
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
        Schema::dropIfExists('c_p_a_f_f_s');
    }
}
