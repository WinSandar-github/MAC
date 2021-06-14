<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecieveDocCpaFfsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recieve_doc_cpa_ffs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cpa_full_form_id');
            $table->string('recieve_no');
            $table->string('docs_files');
            $table->string('recieve');
            $table->timestamps();

            $table->foreign('cpa_full_form_id')
            ->references('id')
            ->on('cpa_full_forms')
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
        Schema::dropIfExists('recieve_doc_cpa_ffs');
    }
}
