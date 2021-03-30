<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batches', function (Blueprint $table) {
            $table->id();
            $table->string('batch_name');
            $table->unsignedBigInteger('training_id');
            $table->string('class_id');
            $table->string('from');
            $table->string('to');
            $table->string('publish_status');
            $table->foreign('training_id')
                  ->references('id')
                  ->on('training_classes')
                  ->onUpdate('cascade')
                  ->onDelete(('cascade'));
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
        Schema::dropIfExists('batches');
    }
}
