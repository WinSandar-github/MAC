<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

class CreateRequirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requirements', function (Blueprint $table) {
            $table->id();
            $table->text('requirement_name')->collation('utf8mb4_unicode_ci');
            $table->string('type')->nullable();
            $table->boolean('require_exam')->nullable();
            // $table->unsignedBigInteger('course_id');
            $table->timestamps();

            // $table->foreign('course_id')
            // ->references('id')
            // ->on('courses')
            // ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requirements');
    }
}
