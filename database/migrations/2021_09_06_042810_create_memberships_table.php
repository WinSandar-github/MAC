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
            $table->text('requirement')->nullable();
            $table->text('description')->nullable();
            $table->bigInteger('form_fee')->nullable();
            $table->bigInteger('registration_fee')->nullable();
            $table->bigInteger('yearly_fee')->nullable();
            $table->bigInteger('renew_fee')->nullable();
            $table->bigInteger('late_fee')->nullable();
            $table->bigInteger('late_feb_fee')->nullable();
            $table->bigInteger('expire_fee')->nullable();
            $table->bigInteger('cpa_subject_fee')->nullable();
            $table->bigInteger('da_subject_fee')->nullable();
            $table->bigInteger('renew_cpa_subject_fee')->nullable();
            $table->bigInteger('renew_da_subject_fee')->nullable();
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
