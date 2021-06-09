<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeOfServiceProvidedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_of_service_provideds', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('audit_firm_type_id');
            $table->timestamps();

          

            $table->foreign('audit_firm_type_id')
                ->references('id')
                ->on('audit_firm_types')
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
        Schema::dropIfExists('type_of_service_provideds');
    }
}
