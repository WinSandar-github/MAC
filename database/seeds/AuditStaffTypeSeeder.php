<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class AuditStaffTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('audit_staff_types')->delete();

        DB::table('audit_staff_types')->insert([
            array(
                'name' => 'No. of principals/ partners/ directors',
                'assistance' => false
            ),
            array(
                'name' => 'No. of audit managers',
                'assistance' => false
            ),
            array(
                'name' => 'No. of audit seniors',
                'assistance' => false
            ),
            array(
                'name' => 'CPA Apprenticeship',
                'assistance' => true
            ),
            array(
                'name' => 'Other',
                'assistance' => true
            ),

        ]);
    }
}
