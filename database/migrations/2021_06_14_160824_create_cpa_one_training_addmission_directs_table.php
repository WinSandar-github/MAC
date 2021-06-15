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
            $table->string('photo');
            $table->string('name');
            $table->string('nrc_state_region')->nullable();
            $table->string('nrc_township')->nullable();
            $table->string('nrc_citizen')->nullable();
            $table->string('nrc_number')->nullable();
            $table->string('father_name');
            $table->string('race_religion');
            $table->string('birth_date');
            $table->text('address');
            $table->text('contact_address');
            $table->string('telephone');
            $table->string('email');
            $table->string('occupation');
            $table->string('position');
            $table->string('organization');
            $table->string('salary');
            $table->string('office_address');
            $table->boolean('civil_servant');
            $table->string('degree');
            $table->string('university');
            $table->string('major');
            $table->string('graduation_time');
            $table->string('seat_no');
            $table->string('diplo_second_pass_year');
            $table->string('diplo_second_pass_month');
            $table->string('diplo_second_pass_seat_no');
            $table->unsignedBigInteger('training_ground_id');
            $table->boolean('acca')->default(0);
            $table->boolean('cima')->default(0);
            $table->string('acca_cima_pass_level');
            $table->string('acca_cima_exam_year');
            $table->string('acca_cima_exam_month');
            $table->string('acca_cima_reg_no');
            $table->timestamps();


            $table->foreign('training_ground_id')
            ->references('id')
            ->on('training_grounds')
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
