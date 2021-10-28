<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApprenticeAccountantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apprentice_accountants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_info_id');
            $table->string('article_form_type');
            $table->boolean('apprentice_exp')->nullable();
            $table->text('apprentice_exp_file')->nullable();
            $table->boolean('gov_staff')->nullable();
            $table->string('gov_position')->nullable();
            $table->string('gov_joining_date')->nullable();
            $table->string('current_address')->nullable();
            $table->string('m_email')->nullable();
            $table->string('request_papp')->nullable();
            $table->string('request_papp_attach')->nullable();
            $table->string('mentor_id')->nullable();
            $table->string('exam_pass_date')->nullable();
            $table->string('exam_pass_batch')->nullable();
            $table->string('ex_papp')->nullable();
            $table->string('exp_start_date')->nullable();
            $table->string('exp_end_date')->nullable();
            $table->boolean('accept_policy')->nullable();
            $table->string('resign_date')->nullable();
            $table->string('resign_reason')->nullable();
            $table->string('recent_org')->nullable();
            $table->text('resign_approve_file')->nullable();
            $table->boolean('resign_status')->default(0);
            $table->string('approve_resign_date')->nullable();
            $table->boolean('know_policy')->nullable();
            $table->boolean('status')->default(0);
            $table->string('registration_fee')->nullable();
            $table->string('mentor_attach_file')->nullable();
            $table->string('contract_start_date')->nullable();
            $table->string('contract_end_date')->nullable();
            $table->boolean('yes_done_attach')->default(0);
            $table->string('done_form_attach')->nullable();
            $table->boolean('done_status')->default(0);
            $table->timestamps();
            $table->string('offline_user')->nullable();
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
        Schema::dropIfExists('apprentice_accountants');
    }
}
