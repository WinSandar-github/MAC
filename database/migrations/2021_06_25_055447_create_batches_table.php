<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batches', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_mm');
            $table->integer('number');
            $table->unsignedBigInteger('course_id');
            $table->date('acdm_year_start_date')->nullable();
            $table->date('acdm_year_end_date')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->date('mac_reg_start_date');
            $table->date('mac_reg_end_date');
            $table->date('self_reg_start_date');
            $table->date('self_reg_end_date');
            $table->date('private_reg_start_date');
            $table->date('private_reg_end_date');
            $table->unsignedBigInteger('moodle_course_id');
            $table->boolean('publish_status');
            $table->date('accept_application_start_date');
            $table->date('accept_application_end_date');
            $table->date('entrance_pass_start_date')->nullable();
            $table->date('entrance_pass_end_date')->nullable();
            $table->date('exam_start_date')->nullable();
            $table->date('exam_end_date')->nullable();
            $table->string('exam_place')->nullable();
            $table->string('exam_time')->nullable();
            $table->timestamps();

            $table->foreign('course_id')
            ->references('id')
            ->on('courses')
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
        Schema::dropIfExists('batches');
    }
}
