<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
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
            'product_name'=>$name,
            'slug'=>Str::slug($name),
            "description"=>$this->faker->sentence(15),
            "product_image"=>$this->faker->imageUrl(800,600),
            'price'=>$this->faker->randomFloat(1,1,999),
            'category_id'=>Category::inRandomOrder()->first()->id,

        ];
    }
}
