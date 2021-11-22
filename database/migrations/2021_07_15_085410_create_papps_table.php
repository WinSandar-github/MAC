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
            $table->string('degree_name')->nullable();
            $table->string('degree_pass_year')->nullable();
            $table->string('cpaff_pass_date')->nullable();
            $table->string('papp_date')->nullable();            
            $table->string('papp_renew_date')->nullable();
            $table->boolean('use_firm')->default(0);
            $table->string('firm_name')->nullable();
            $table->string('firm_type')->nullable();
            $table->string('firm_step')->nullable();
            $table->string('staff_firm_name')->nullable();
            $table->string('cpa_ff_recommendation')->nullable();
            $table->string('recommendation_183')->nullable();
            $table->string('not_fulltime_recommendation')->nullable();
            $table->string('work_in_myanmar_confession')->nullable();
            $table->string('rule_confession')->nullable();
            $table->string('cpd_record')->nullable();
            $table->string('cpd_hours')->nullable();
            $table->string('mpa_mem_card_front')->nullable();
            $table->string('mpa_mem_card_back')->nullable();            
            $table->string('tax_year')->nullable();
            $table->string('tax_free_recommendation')->nullable();
            $table->date('accepted_date')->default(null)->nullable();  
            $table->string('company')->nullable();
            $table->string('period')->nullable();
            $table->string('manager')->nullable();         
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
            $table->string('papp_reg_no')->nullable();
            $table->string('papp_reg_date')->nullable();
            $table->string('audit_work')->nullable();
            
            $table->string('latest_reg_year')->nullable();
            $table->string('previous_latest_reg_year')->nullable(); //only for detail information
            $table->integer('submitted_stop_form')->nullable();
            // $table->string('submitted_from_date')->nullable();
            // $table->string('submitted_to_date')->nullable();
            $table->string('papp_resign_date')->nullable();

            $table->integer('type')->nullable();
            $table->text('self_confession')->nullable();
            $table->text('reject_description')->nullable();
            $table->string('validate_from')->nullable();
            $table->string('validate_to')->nullable();
            $table->boolean('offline_user')->default(0);
            $table->string('cpaff_reg_no')->nullable();//need to add
            $table->string('audit_year')->nullable();//need to add
            $table->integer('self_confession_1')->nullable();
            $table->string('reg_date')->nullable();
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
