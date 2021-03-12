<?php

use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regions')->insert([
            array(
                'region_name_mm' => 'ကချင်ပြည်နယ်'
            ),
            array(
                'region_name_mm' => 'ကယားပြည်နယ်'
            ),
            array(
                'region_name_mm' => 'ကရင်ပြည်နယ်'
            ),
            array(
                'region_name_mm' => 'ချင်းပြည်နယ်'
            ),
            array(
                'region_name_mm' => 'စစ်ကိုင်းတိုင်း'
            ),
            array(
                'region_name_mm' => 'တနင်္သာရီတိုင်း'
            ),
            array(
                'region_name_mm' => 'ပဲခူးတိုင်း'
            ),
            array(
                'region_name_mm' => 'မကွေးတိုင်း'
            ),
            array(
                'region_name_mm' => 'မန္တလေးတိုင်း'
            ),
            array(
                'region_name_mm' => 'မွန်ပြည်နယ်'
            ),
            array(
                'region_name_mm' => 'ရခိုင်ပြည်နယ်'
            ),
            array(
                'region_name_mm' => 'ရန်ကုန်တိုင်း'
            ),
            array(
                'region_name_mm' => 'ရှမ်းပြည်နယ်'
            ),
            array(
                'region_name_mm' => 'ဧရာဝတီတိုင်း'
            ),
        ]);
    }
}
