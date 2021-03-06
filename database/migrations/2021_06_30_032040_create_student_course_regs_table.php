<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentCourseRegsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_course_regs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sr_no')->nullable();
            $table->unsignedBigInteger('student_info_id');
            $table->unsignedBigInteger('batch_id');                                                                                                                                                                                                             
            $table->bigInteger('type')->nullable();
            $table->bigInteger('mac_type')->nullable();
            $table->tinyInteger('is_finished')->default(0)->nullable();
            $table->char('status',1);
            $table->date('date');
            $table->bigInteger('qt_entry')->default(0);
            $table->boolean('approve_reject_status')->default(0)->nullable();
            $table->text('remark')->nullable();
            $table->integer('offline_user')->default(0)->nullable();
            $table->timestamps();

            $table->foreign('student_info_id')
            ->references('id')
            ->on('student_infos')
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
        Schema::dropIfExists('student_course_regs');
    }
}
