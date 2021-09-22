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
            $table->string('profile_photo')->nullable();
            $table->string('cpa')->nullable();
            $table->string('ra')->nullable();
            $table->string('foreign_degree')->nullable();
            $table->string('papp_date');
            $table->boolean('use_firm')->default(0);
            $table->string('firm_name')->nullable();
            $table->string('firm_type')->nullable();
            $table->string('firm_step')->nullable();
            $table->string('staff_firm_name')->nullable();
            $table->string('cpa_ff_recommendation');
            $table->string('recommendation_183');
            $table->string('not_fulltime_recommendation');
            $table->string('work_in_myanmar_confession');
            $table->string('rule_confession');
            $table->string('cpd_record');
            $table->string('tax_year');
            $table->string('tax_free_recommendation');
            $table->date('accepted_date')->default(null)->nullable();
            $table->boolean('status')->default(0);
            $table->string('renew_file')->default(null)->nullable();
            $table->string('renew_papp_reg')->default(null)->nullable();
            $table->string('renew_micpa')->default(null)->nullable();
            $table->string('renew_cpd')->default(null)->nullable();
            $table->string('renew_183_recomm')->default(null)->nullable();
            $table->string('renew_not_fulltime_recomm')->default(null)->nullable();
            $table->string('renew_rule_confession')->default(null)->nullable();
            $table->date('renew_accepted_date')->default(null)->nullable();
            $table->boolean('renew_status')->default(null)->nullable();

            //adding
            $table->string('reg_no')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('contact_mail')->nullable();
            $table->string('cpa_batch_no')->nullable();
            $table->string('letter')->nullable();
            $table->string('contact_mail')->nullable();

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
