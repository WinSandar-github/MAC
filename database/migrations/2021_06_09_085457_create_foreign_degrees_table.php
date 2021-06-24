<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignDegreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foreign_degrees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cpa_full_form_id');
            $table->string('country')->nullable();
            $table->string('organization')->nullable();
            $table->string('year')->nullable();
            $table->string('month')->nullable();
            $table->string('seat_num')->nullable();
            $table->string('certificate')->nullable();
            $table->timestamps();

            $table->foreign('cpa_full_form_id')
            ->references('id')
            ->on('cpa_full_forms')
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
        Schema::dropIfExists('foreign_degrees');
    }
}
