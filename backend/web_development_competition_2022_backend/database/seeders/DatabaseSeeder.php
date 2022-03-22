<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name"=>"competitor1",
            "email"=>"competitor1@skill17.com",
            "password"=>Hash::make("demopass1")
        ]);
        User::create([
            "name"=>"competitor2",
            "email"=>"competitor2@skill17.com",
            "password"=>Hash::make("demopass2")
        ]);
    }
}
