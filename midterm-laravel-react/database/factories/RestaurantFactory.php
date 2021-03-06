<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RestaurantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
         
                'name' => $this->faker->name(),
                'price' =>rand(10,100),
                'old_price' => rand(10,100),
                'image' => $this->faker->image('public/images',640,480, null, false),
                'description' => $this->faker->name(),
                'category_id' =>rand(1,10),
       
        ];
    }
}
