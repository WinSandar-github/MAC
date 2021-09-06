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
            $table->unsignedBigInteger('requirement_id');
            $table->unsignedBigInteger('description_id');
            $table->bigInteger('form_fee');
            $table->bigInteger('registration_fee');
            $table->bigInteger('yearly_fee');
            $table->bigInteger('renew_fee');
            $table->bigInteger('late_fee');
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
