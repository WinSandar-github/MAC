<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CurrentCheckServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('current_check_services')->insert([
            array(
                'name'  => "အများပိုင်းကုမ္မဏီ",
                'type'  => "1",
            ),
            array(
                'name'  => "လူနည်းစုပိုင်ကုမ္မဏီ",
                'type'  => "1",
            ),
            array(
                'name'  => "တစ်ဦးပိုင်ကုမ္မဏီနှင့်အစုစပ်လုပ်န်း",
                'type'  => "1",
            ),
            array(
                'name'  => "အစိုးရ၏အရင်းအနှီးပါဝင်သည်ဖက်စပ်လုပ်ငန်းများ",
                'type'  => "1",
            ),
            array(
                'name'  => "ပုဂ္ဂလိကဘဏ်နှင့်အာမခံလုပ်ငန်းများ",
                'type'  => "1",
            ),
            array(
                'name'  => "Non Government Organization",
                'type'  => "1",
            ),
            array(
                'name'  => "Non Statutory Audit - Management Audit",
                'type'  => "1",
            ),
            array(
                'name'  => "Non Statutory Audit - Enviromental Audit",
                'type'  => "1",
            ),
            array(
                'name'  => "အခြား",
                'type'  => "1",
            ),  
            array(
                'name'  => "Government Organization",
                'type'  => "2",
            ),
        ]);
    }
}
