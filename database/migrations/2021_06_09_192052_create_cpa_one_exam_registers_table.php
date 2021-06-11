<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCpaOneExamRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cpa_one_exam_registers', function (Blueprint $table) {
            $table->id();
            $table->string('exam_center');
            $table->string('photo');
            $table->string('name_mm');
            $table->string('name_en');
            $table->string('nrc_state_region')->nullable();
            $table->string('nrc_township')->nullable();
            $table->string('nrc_citizen')->nullable();
            $table->string('nrc_number')->nullable();
            $table->string('father_name_mm');
            $table->string('father_name_en');
            $table->string('personal_no');
            $table->string('birth_date');
            $table->text('contact_address');
            $table->string('phone');
            $table->string('email');
            $table->boolean('accounting_council');
            $table->boolean('private_training');
            $table->boolean('self_learner');
            $table->string('private_training_name');
            $table->string('last_exam_no');
            $table->string('last_exam_time');
            $table->boolean('last_exam_module_one');
            $table->boolean('last_exam_module_two');
            $table->unsignedBigInteger('module_id');
            $table->string('receipt_no');
            $table->string('receipt_date');
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
        Schema::dropIfExists('cpa_one_exam_registers');
    }
}
