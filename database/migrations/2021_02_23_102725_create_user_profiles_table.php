<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('father_name')->nullable();
            $table->string('nrc_state_region');
            $table->string('nrc_township');
            $table->string('nrc_citizen');
            $table->string('nrc_number');
            $table->date('date_of_birth')->nullable();
            $table->integer('age');
            $table->string('race')->nullable();
            $table->string('religion')->nullable();
            $table->string('current_address')->nullable();
            $table->string('partner_name')->nullable();
            $table->string('current_position')->nullable();
            $table->integer('current_salary');
            $table->string('current_department')->nullable();
            $table->string('current_job_location')->nullable();
            $table->string('current_job_region')->nullable();
            $table->string('current_position_start_date')->nullable();
            $table->string('job_start_date')->nullable();
            $table->unsignedBigInteger('training_class_id');
            $table->string('contact_number')->nullable();
            $table->unsignedBigInteger('login_admin');

            $table->foreign('training_class_id')->references('id')->on('training_classes');
            $table->foreign('login_admin')->references('id')->on('users');
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
        Schema::dropIfExists('user_profiles');
    }
}
