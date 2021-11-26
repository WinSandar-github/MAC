<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;
class DegreeSeeder extends CsvSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function __construct()
    {
        $this->file = 'database/seeds/csvs/degrees.csv';
    }

    public function run()
    {
        DB::disableQueryLog();
        parent::run();
    }

    // public function run()
    // {
    //     DB::table('degrees')->delete();

    //     DB::table('degrees')->insert([
    //         array(
    //             'name'  => "Bcom",
    //         ),
    //         array(
    //             'name'  => "Bact",
    //         ),
    //         array(
    //             'name'  => "BBA",
    //         ),
    //         array(
    //             'name'  => "BBSC",
    //         ),
    //         array(
    //             'name'  => "CIMA",
    //          ),
    //          array(
    //             'name'  => "ACCA",
    //          ),


    //     ]);



    // }
}
