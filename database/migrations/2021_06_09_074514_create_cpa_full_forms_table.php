<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCpaFullFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cpa_full_forms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nrc_state_region')->nullable();
            $table->string('nrc_township')->nullable();
            $table->string('nrc_citizen')->nullable();
            $table->string('nrc_number')->nullable();
            $table->string('father_name');
            $table->string('education_level_id');
            $table->string('cpa_no');
            $table->text('address');
            $table->string('phone');
            $table->string('email');
            $table->boolean('local_degree')->default(0)->nullable();
            $table->boolean('foreign_degree')->default(0)->nullable();
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
        Schema::dropIfExists('cpa_full_forms');
    }
}
