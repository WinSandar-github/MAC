<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentRegisterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_register', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_info_id');
            $table->date('date');
            $table->text('reg_reason')->nullable();
            $table->unsignedBigInteger('invoice_id');
            $table->date('invoice_date');
            $table->integer('type');
            $table->integer('status');
            $table->string('form_type');
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
        Schema::dropIfExists('student_register');
    }
}
