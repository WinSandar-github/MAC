<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('form_fee');
            $table->integer('registration_fee');
            $table->integer('exam_fee');
            $table->integer('tution_fee');
            $table->date('registration_start_date');
            $table->date('registration_end_date');
            $table->text('description');
            $table->unsignedBigInteger('course_type_id');
            $table->string('code','20');
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
        Schema::dropIfExists('courses');
    }
}
