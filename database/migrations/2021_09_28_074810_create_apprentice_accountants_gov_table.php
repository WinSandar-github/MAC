<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApprenticeAccountantsGovTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apprentice_accountants_gov', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_info_id');
            $table->string('labor_registration_no');
            $table->string('father_job')->nullable();
            $table->string('father_address')->nullable();
            $table->boolean('married')->nullable();
            $table->string('married_name')->nullable();
            $table->string('married_job')->nullable();
            $table->string('home_address')->nullable();
            $table->string('current_address')->nullable();
            $table->string('address')->nullable();
            $table->string('tempory_address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('m_email')->nullable();
            $table->string('labor_registration_attach')->nullable();
            $table->string('recommend_attach')->nullable();
            $table->string('police_attach')->nullable();
            $table->boolean('accept_policy')->nullable();
            $table->boolean('status')->default(0);
            $table->string('contract_start_date')->nullable();
            $table->string('contract_end_date')->nullable();
            $table->string('done_form_attach')->nullable();
            $table->boolean('done_status')->default(0);
            $table->boolean('resign_status')->default(0);
            $table->timestamps();

            $table->foreign('student_info_id')->references('id')->on('student_infos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apprentice_accountants_gov');
    }
}
