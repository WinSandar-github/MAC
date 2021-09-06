<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TypeOfServiceProvidedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_of_service_provideds')->delete();

        DB::table('type_of_service_provideds')->insert([
            array(
                'name' => 'Audit',
                'audit_firm_type_id' => 1

            ),
            array(
                'name' => 'Non-Audit',
                'audit_firm_type_id' => 1
            ),
            array(
                'name' => 'Accounting',
                'audit_firm_type_id' => 2
            ),
            array(
                'name' => 'Advisory',
                'audit_firm_type_id' => 2
            ),
            array(
                'name' => 'Taxation',
                'audit_firm_type_id' => 2
            ),
            array(
                'name' => 'Liquidation',
                'audit_firm_type_id' => 2
            ),
            array(
                'name' => 'Accounting System',
                'audit_firm_type_id' => 2
            ),
            array(
                'name' => 'Other',
                'audit_firm_type_id' => 2
            ),



        ]);
    }
}
