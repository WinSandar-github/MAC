<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DegreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('degrees')->insert([
            array(
                'name'  => "Bcom",
            ),
            array(
                'name'  => "Bact",
            ),
            array(
                'name'  => "BBA",
            ),
            array(
                'name'  => "BBSC",
            ),
            array(
                'name'  => "CIMA",
             ),
             array(
                'name'  => "ACCA",
             ),
           
           
            ]);     
           
           
            
    }
}
