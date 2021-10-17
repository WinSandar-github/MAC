<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblClassroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_classrooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('school_id');
            $table->integer('classroom_number')->default(0);
            $table->string('classroom_measurement')->nullable();
            $table->string('student_num_limit')->default(0);
            $table->string('air_con')->nullable();
            $table->string('classroom_attach')->nullable();
            
            $table->timestamps();
            $table->foreign('school_id')
            ->references('id')
            ->on('school_registers')
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
        Schema::dropIfExists('tbl_classrooms');
    }
}
