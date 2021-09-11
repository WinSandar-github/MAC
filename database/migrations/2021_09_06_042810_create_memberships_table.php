<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memberships', function (Blueprint $table) {
            $table->id();
            $table->string('membership_name');
            $table->string('requirement_id');
            $table->string('description_id');
            $table->bigInteger('form_fee')->nullable();
            $table->bigInteger('registration_fee')->nullable();
            $table->bigInteger('yearly_fee')->nullable();
            $table->bigInteger('renew_fee')->nullable();
            $table->bigInteger('late_fee')->nullable();
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
        Schema::dropIfExists('memberships');
    }
}
