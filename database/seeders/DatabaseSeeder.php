<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use App\Models\StoreProduct;
use App\Models\User;
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
        // \App\Models\User::factory(10)->create();

//         \App\Models\User::factory(10)->create([
//             'name' => fake()->word(2,true),
//             'email' =>  fake()->unique()->safeEmail(),
//             'store_id'=>Store::inRandomOrder()->first()->id,
//             "password"=>'password',
//         ]);
//       Category::factory(10)->create();
//       Product::factory(30)->create();
//        User::factory(20)->create();
//        Store::factory(5)->create();

      // $this->call(UserSeeder::class);

    StoreProduct::factory(10)->create();
    }
}
