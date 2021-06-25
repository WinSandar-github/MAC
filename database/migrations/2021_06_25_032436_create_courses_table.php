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
            $table->unsignedBigInteger('course_fee_id');
            $table->unsignedBigInteger('degree_id');
            $table->timestamps();

            $table->foreign('course_fee_id')
            ->references('id')
            ->on('course_fees')
            ->onDelete('cascade');   

            $table->foreign('degree_id')
            ->references('id')
            ->on('degrees')
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
        Schema::dropIfExists('courses');
    }
}
