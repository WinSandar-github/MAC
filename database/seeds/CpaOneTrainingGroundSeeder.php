<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CpaOneTrainingGroundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('training_grounds')->insert([
            array(
                'name' => 'ပြည်ထောင်စုစာရင်းစစ်ရုံး၊ ရန်ကုန်သင်တန်းကျောင်း'
            ),
            array(
                'name' => 'ကိုယ်ပိုင်စာရင်းကိုင်သင်တန်းကျောင်း'
            ),
            array(
                'name' => 'ကိုယ်တိုင်လေ့လာသင်ယူမယ်သူများ'
            ),
            
            
        ]);
    }
}
