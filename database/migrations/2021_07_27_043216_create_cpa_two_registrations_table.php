<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCpaTwoRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cpa_two_registrations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cpa_one_id');
            $table->date('cpa_one_pass_date')->nullable();;
            $table->string('cpa_one_access_no')->nullable();;
            $table->string('cpa_one_success_no')->nullable();;
            $table->boolean('enrol_no_exam')->nullable();;
            $table->boolean('attendance')->nullable();;
            $table->boolean('fail_exam')->nullable();;
            $table->boolean('resigned')->nullable();;
            $table->string('batch_session_no')->nullable();;
            $table->string('entrance_part')->nullable();;
            $table->string('entrance_exam_no')->nullable();;
            $table->integer('cpa_two_type')->nullable();;
            $table->timestamps();

            $table->foreign('cpa_one_id')
            ->references('id')
            ->on('cpa_one_registrations')
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
        Schema::dropIfExists('cpa_two_registrations');
    }
}
