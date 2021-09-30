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
            $table->string('name_mm');
            $table->integer('form_fee');
            $table->integer('selfstudy_registration_fee');
            $table->integer('privateschool_registration_fee');
            $table->integer('mac_registration_fee');
            $table->integer('exam_fee');
            $table->integer('tution_fee');
            $table->text('description');
            $table->unsignedBigInteger('course_type_id');
            $table->string('code','20');
            $table->string('requirement_id');
            $table->bigInteger('cpa_subject_fee')->nullable();
            $table->bigInteger('da_subject_fee')->nullable();
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
