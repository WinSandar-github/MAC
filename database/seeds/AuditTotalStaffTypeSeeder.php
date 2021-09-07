<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class AuditTotalStaffTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('audit_total_staff_types')->delete();

        DB::table('audit_total_staff_types')->insert([
            array(
                'name' => 'No of principals/ partners'
            ),
            array(
                'name' => 'No of directors who are not principals/ partners'
            ),
            array(
                'name' => 'No of managerial level staff	'
            ),
            array(
                'name' => 'No of non-managerial level'
            ),

        ]);
    }
}
