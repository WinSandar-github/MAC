<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationHistroysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_histroys', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_info_id');
            $table->string('university_name')->nullable();
            $table->string('degree_id')->nullable();
            $table->string('degree_name')->nullable();
            $table->string('qualified_date')->nullable();
            $table->string('roll_number',30)->nullable();
            $table->string('certificate')->nullable();
            $table->integer('school_id')->nullable();
            $table->integer('teacher_id')->nullable();
            
            
            $table->timestamps();

            $table->foreign('student_info_id')
            ->references('id')
            ->on('student_infos')
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
        Schema::dropIfExists('education_histroys');
    }
}
