<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeOfServiceOthersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_of_service_others', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('accountancy_firm_info_id');
            $table->unsignedBigInteger('type_of_service_id');
            $table->string('name');
            $table->timestamps();

            $table->foreign('accountancy_firm_info_id')
            ->references('id')
            ->on('accountancy_firm_information')
            ->onDelete('cascade'); 
             
            $table->foreign('type_of_service_id')
            ->references('id')
            ->on('type_of_service_provideds')
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
        Schema::dropIfExists('type_of_service_others');
    }
}
