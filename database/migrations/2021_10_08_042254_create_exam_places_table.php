<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamPlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_places', function (Blueprint $table) {
            $table->id();
            $table->string('place');
            $table->string('room');
            $table->string('building');
            $table->integer('start');
            $table->integer('end');
            $table->unsignedBigIntger('exam_id');
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
        Schema::dropIfExists('exam_places');
    }
}
