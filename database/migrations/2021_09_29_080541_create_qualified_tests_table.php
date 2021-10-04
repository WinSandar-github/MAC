<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQualifiedTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qualified_tests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_info_id');
            $table->bigInteger('sr_no')->nullable();
            $table->string('current_job')->nullable();
            $table->string('local_education')->nullable();
            $table->string('local_education_certificate')->nullable();
            $table->integer('foreign_education')->nullable();
            $table->string('organization_name')->nullable();
            $table->text('organization_address')->nullable();
            $table->string('organization_email')->unique()->nullable();
            $table->string('exam_date')->nullable();
            $table->string('exam_reg_no');
            $table->integer('approve_reject_status');
            $table->integer('know_policy');
            $table->foreign('student_info_id')
                  ->references('id')
                  ->on('student_infos')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('qualified_tests');
    }
}
