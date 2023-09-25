<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
                "name"=>'Mohammad',
                "email"=>"mohammadrayya3@hotmail.com",
                "password"=>Hash::make('password'),
                'role'=>"admin"
            ]);
    }
}