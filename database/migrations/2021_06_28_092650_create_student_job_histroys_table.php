<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentJobHistroysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_job_histroys', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_info_id');
            $table->string('name')->nullable();
            $table->string('position')->nullable();
            $table->string('department')->nullable();
            $table->string('organization')->nullable();
            $table->string('company_name')->nullable();
            $table->string('salary')->nullable();
            $table->string('office_address')->nullable();

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
        Schema::dropIfExists('student_job_histroys');
    }
}
