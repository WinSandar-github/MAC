<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        DB::table('users')->insert([
            array(
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin1234'),
                'created_at' => now(),
                'updated_at' => now()
            ),
            array(
                'name' => 'Nikola Tesla',
                'email' => 'tesla@ldap.forumsys.com',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now()
            ),
        ]);
    }
}
