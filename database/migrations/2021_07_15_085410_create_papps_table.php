<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePappsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('papps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->string('cpa');
            $table->string('ra');
            $table->string('foreign_degree');
            $table->string('papp_date');
            $table->boolean('use_firm')->default(0);
            $table->string('firm_name');
            $table->string('firm_type');
            $table->string('firm_step');
            $table->string('staff_firm_name');
            $table->string('cpa_ff_recommendation');
            $table->string('recommendation_183');
            $table->string('not_fulltime_recommendation');
            $table->string('work_in_myanmar_confession');
            $table->string('rule_confession');
            $table->string('cpd_record');
            $table->string('tax_year');
            $table->string('tax_free_recommendation');
            $table->timestamps();

            $table->foreign('student_id')
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
        Schema::dropIfExists('papps');
    }
}
