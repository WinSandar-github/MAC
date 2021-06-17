<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCpaTwoRegPrivateTrainNewbiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cpa_two_reg_private_train_newbies', function (Blueprint $table) {
            $table->id();
            $table->string('private_training_name');
            $table->string('academic_year');
            $table->string('photo');
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
            $table->string('office_area');
            $table->boolean('civil_servant');
            $table->text('address');
            $table->text('contact_address');
            $table->string('phone');
            $table->string('email');
            $table->string('cpa_one_pass_time');
            $table->string('cpa_one_personal_no');
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
        Schema::dropIfExists('cpa_two_reg_private_train_newbies');
    }
}
