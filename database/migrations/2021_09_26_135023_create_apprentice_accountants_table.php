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
            $table->integer('article_form_type');
            $table->boolean('apprentice_exp')->nullable();
            $table->text('apprentice_exp_file')->nullable();
            $table->boolean('gov_staff');
            $table->string('gov_position')->nullable();
            $table->date('gov_joining_date')->nullable();
            $table->string('request_papp');
            $table->date('exam_pass_date')->nullable();
            $table->string('exam_pass_batch')->nullable();
            $table->string('ex_papp')->nullable();
            $table->date('exp_start_date')->nullable();
            $table->date('exp_end_date')->nullable();
            $table->boolean('accept_policy');
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
        Schema::dropIfExists('apprentice_accountants');
    }
}
