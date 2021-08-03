<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountancyFirmInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accountancy_firm_information', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('audit_firm_type_id');
            $table->unsignedBigInteger('local_foreign_id');
            $table->string('accountancy_firm_reg_no');
            $table->string('accountancy_firm_name');
            $table->string('township');
            $table->string('postcode');
            $table->string('city');
            $table->string('state_region');
            $table->string('telephones');
            $table->string('email');
            $table->string('website');
            $table->string('managing_director')->nullable();
            $table->unsignedBigInteger('organization_structure_id');
            $table->string('name_of_sole_proprietor');
            $table->unsignedBigInteger('type_of_service_provided_id');
            $table->boolean('permanent_suspension')->default(false);
            $table->string('declaration');
            $table->integer('approve_reject_status')->default(0);
            $table->timestamps();

            $table->foreign('audit_firm_type_id')
            ->references('id')
            ->on('audit_firm_types')
            ->onDelete('cascade');

            $table->foreign('local_foreign_id')
            ->references('id')
            ->on('local_foreigns')
            ->onDelete('cascade');

            $table->foreign('type_of_service_provided_id')
            ->references('id')
            ->on('type_of_service_provideds')
            ->onDelete('cascade');

            $table->foreign('organization_structure_id')
            ->references('id')
            ->on('organization_structures')
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
        Schema::dropIfExists('accountancy_firm_information');
    }
}
