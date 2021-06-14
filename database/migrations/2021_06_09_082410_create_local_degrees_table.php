<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalDegreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('local_degrees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cpa_full_form_id');
            $table->string('year')->nullable();
            $table->string('personal_no')->nullable();
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
        Schema::dropIfExists('local_degrees');
    }
}
