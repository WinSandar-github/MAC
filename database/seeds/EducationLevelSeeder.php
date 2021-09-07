<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class EducationLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('education_levels')->delete();

        DB::table('education_levels')->insert([
            array(
                'name' => 'CPA'
            ),
            array(
                'name' => 'RA'
            ),
            array(
                'name' => 'အသိအမှတ်ပြုပြည်ပဘွဲ့'
            ),


        ]);
    }
}
