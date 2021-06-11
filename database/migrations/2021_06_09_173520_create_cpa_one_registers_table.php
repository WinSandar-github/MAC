<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCpaOneRegistersTable extends Migration
{
    /**
     * Run the migrations.
    *
     * @return void
     */
    public function up()
    {
        Schema::create('cpa_one_registers', function (Blueprint $table) {
            $table->id();
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
            $table->string('birth_date');
            $table->string('education');
            $table->string('position');
            $table->string('department');
            $table->string('office_area');
            $table->string('civil_servant');
            $table->text('address');
            $table->string('phone');
            $table->string('email');
            $table->string('direct_access_no');
            $table->string('entry_success_no');
            $table->string('gov_department');
            $table->string('personal_acc_training');
            $table->string('good_morale_file');
            $table->string('no_crime_file');
            $table->unsignedBigInteger('module_id');
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
        Schema::dropIfExists('cpa_one_registers');
    }
}
