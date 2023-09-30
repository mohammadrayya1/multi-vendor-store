<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name= $this->faker->word(2,true);
        return [
            'name'=>$name,
            'slug'=>Str::slug($name),
            "description"=>$this->faker->sentence(15),
            "logo_imag"=>$this->faker->imageUrl(800,600),
            'user_id'=>User::inRandomOrder()->first()->id,
        ];
    }
}
