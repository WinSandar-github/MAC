<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCpaOneRegPrivateTrainingOldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cpa_one_reg_private_training_olds', function (Blueprint $table) {
            $table->id();
            $table->string('photo');
            $table->string('private_training_name');
            $table->string('academic_year');
            $table->string('name_mm');
            $table->string('name_en');
            $table->string('nrc_state_region')->nullable();
            $table->string('nrc_township')->nullable();
            $table->string('nrc_citizen')->nullable();
            $table->string('nrc_number')->nullable();
            $table->string('father_name_mm');
            $table->string('father_name_en');
            $table->string('race_religion');
            $table->string('birth_date');
            $table->string('education');
            $table->string('position');
            $table->string('department');
            $table->string('office_region');
            $table->string('civil_servant');
            $table->text('address');
            $table->text('contact_address');
            $table->string('phone');
            $table->string('email');
            $table->boolean('enrol_no_exam');
            $table->boolean('attendance');
            $table->boolean('fail_exam');
            $table->string('resigned');
            $table->string('batch_session_no');
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
        Schema::dropIfExists('cpa_one_reg_private_training_olds');
    }
}
