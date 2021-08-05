<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamRegisterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_register', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_info_id');
            $table->date('date');
            $table->string('invoice_image');
            $table->date('invoice_date');
            $table->string('private_school_name')->nullable();
            $table->string('grade')->nullable();
            $table->unsignedBigInteger('batch_id');
            $table->integer('is_full_module');
            $table->unsignedBigInteger('exam_type_id');  
            $table->string('form_type')->nullable();          
            $table->integer('status');
            $table->integer('last_ans_exam_no')->nullable();
            $table->integer('last_ans_module')->nullable();
         
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
        Schema::dropIfExists('exam_register');
    }
}
