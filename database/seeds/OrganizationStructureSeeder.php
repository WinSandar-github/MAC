<?php

use Illuminate\Database\Seeder;


use Illuminate\Support\Facades\DB;


class OrganizationStructureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('organization_structures')->insert([
            array(
                'name' => 'Sole Proprietorship'
            ),
            array(
                'name' => 'Partnership'
            ),
            array(
                'name' => 'Company Incorporated'
            ),
            array(
                'name' => 'Other'
            ),

        ]);
    }
}
