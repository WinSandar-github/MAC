<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCpaOneTrainingAddmissionWithExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cpa_one_training_addmission_with_exams', function (Blueprint $table) {
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
        Schema::dropIfExists('cpa_one_training_addmission_with_exams');
    }
}
