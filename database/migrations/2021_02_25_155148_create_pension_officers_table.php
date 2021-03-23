<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePensionOfficersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pension_officers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_profile_id')->nullable();
            $table->string('pension_class_number')->nullable();
            $table->date('pension_year')->nullable();
            $table->string('pension_university')->nullable();
            
            $table->foreign('user_profile_id')->references('id')->on('user_profiles');
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
        Schema::dropIfExists('pension_officers');
    }
}
