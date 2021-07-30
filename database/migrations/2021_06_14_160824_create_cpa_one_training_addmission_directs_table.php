<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCpaOneTrainingAddmissionDirectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cpa_one_training_addmission_directs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_info_id');
            $table->text('certificate');
            $table->string('da_pass_year')->nullable();
            $table->string('da_pass_month')->nullable();
            $table->string('da_pass_roll_number')->nullable();
            $table->string('acca_cima_pass_level')->nullable();
            $table->string('acca_cima_exam_year')->nullable();
            $table->string('acca_cima_exam_month')->nullable();
            $table->string('acca_cima_reg_no')->nullable();
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
        Schema::dropIfExists('cpa_one_training_addmission_directs');
    }
}
