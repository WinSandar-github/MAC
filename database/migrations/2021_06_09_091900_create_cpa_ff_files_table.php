<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCpaFfFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cpa_ff_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cpa_full_form_id');
            $table->string('cpa');
            $table->string('mpa_member_card');
            $table->string('nrc');
            $table->string('cdp_record');
            $table->string('passport_photo');
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
        Schema::dropIfExists('cpa_ff_files');
    }
}
