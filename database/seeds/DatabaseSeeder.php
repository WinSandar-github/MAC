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
        $this->call([UsersTableSeeder::class]);
        // $this->call([TrainingClassSeeder::class]);
        // $this->call([RegionSeeder::class]);
        // $this->call([Training_typeSeeder::class]);
        // $this->call([TMSClassSeeder::class]);
        // $this->call([OrganizationStructureSeeder::class]);
        // $this->call([AuditFirmTypeSeeder::class]);
        // $this->call([AuditStaffTypeSeeder::class]);
        // $this->call([AuditTotalStaffTypeSeeder::class]);
        // $this->call([NonAuditTotalStaffTypeSeeder::class]);
        // $this->call([TypeOfServiceProvidedSeeder::class]);
        // $this->call([LocalForeignSeeder::class]);
        // $this->call([EducationLevelSeeder::class]);



        
        //factory(App\MoodleModel\MdlUser::class)->create();
    }
}
