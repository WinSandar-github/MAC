<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherRenewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_renews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('teacher_id');
            $table->string('email');
            $table->string('name_mm');
            $table->string('name_eng');
            $table->string('nrc_state_region');
            $table->string('nrc_township');
            $table->string('nrc_citizen');
            $table->string('nrc_number');
            $table->string('father_name_mm');
            $table->string('father_name_eng');
            $table->text('certificates');
            $table->text('diplomas');
            $table->string('phone');
            $table->date('renew_date')->default(null)->nullable();
            $table->integer('approve_reject_status')->default(0);
            $table->string('image')->nullable();
            $table->string('nrc_front')->nullable();
            $table->string('nrc_back')->nullable();
            $table->string('current_address');
            $table->integer('school_id')->nullable();
            $table->integer('school_type')->nullable();
            $table->text('reason')->nullable();
            $table->integer('initial_status')->default(1);
            $table->string('payment_method')->nullable();
            $table->string('payment_date')->nullable();
            $table->text('cessation_reason')->nullable();
            $table->string('school_name')->nullable();
            $table->string('regno')->nullable();
            $table->bigInteger('student_info_id')->nullable();
            $table->timestamps();

            $table->foreign('teacher_id')
            ->references('id')
            ->on('teacher_registers')
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
        Schema::dropIfExists('teacher_renews');
    }
}
