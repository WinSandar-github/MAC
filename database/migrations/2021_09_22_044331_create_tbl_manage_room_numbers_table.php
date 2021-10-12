<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblManageRoomNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_manage_room_numbers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('school_id');
            $table->integer('manage_room_numbers')->default(0);
            $table->string('manage_room_measurement')->nullable();
            $table->string('manage_room_attach')->nullable();
            
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
        Schema::dropIfExists('tbl_manage_room_numbers');
    }
}
