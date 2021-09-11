<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;


class AlphabetSeeder extends CsvSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   
    public function __construct()
    {
        $this->file = 'database/seeds/csvs/alphabets.csv';
    }
    
     
    public function run()
    {
        DB::disableQueryLog();
        parent::run();
    }
}
