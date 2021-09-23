<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class NonAuditTotalStaffTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('non_audit_total_staff_types')->delete();

        DB::table('non_audit_total_staff_types')->insert([
            array(
                'name' => 'No. of directors who are also shareholders'
            ),
            array(
                'name' => 'No. of directors who are not shareholders'
            ),
            array(
                'name' => 'No. of managerial level staff'
            ),
            array(
                'name' => 'No. of non-managerial level'
            ),

        ]);

    }
}
