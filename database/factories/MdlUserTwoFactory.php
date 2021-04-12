<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\MoodleModel\MdlUser;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

$factory->define(MdlUser::class, function (Faker $faker) {
    return [
        'auth' => 'manual',
        'confirmed' => 1,
        'mnethostid' => 1,
        'username' => 'admin',
        'password' => Hash::make('admin1234'),
        'firstname' => 'TMS',
        'lastname' => 'Admin',
        'email' => 'admin@aggademo.me',
        'timezone' => 'Asia\Yangon',
        'timecreated' => now()->toArray()["timestamp"],
        'timemodified' => now()->toArray()["timestamp"]
    ];
});
