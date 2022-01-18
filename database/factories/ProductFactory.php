<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title=explode(' ', $this->faker->jobTitle());

        return [
            'sub_cat_id' => rand(1,6),
            'name' => $title[0],
            'description' => $this->faker->paragraph(),
            'price'=>rand(5,25),
            'slug' => strtolower($title[0]),
            'created_at'=>date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s")
        ];
    }
}
