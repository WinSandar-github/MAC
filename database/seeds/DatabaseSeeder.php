<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call([UsersTableSeeder::class]);
        // $this->call([TrainingClassSeeder::class]);
        // $this->call([RegionSeeder::class]);
        // $this->call([Training_typeSeeder::class]);
        // $this->call([TMSClassSeeder::class]);
        
        factory(App\MoodleModel\MdlUser::class)->create();
    }
}
