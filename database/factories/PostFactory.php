<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'uuid' => Str::uuid(),
            'title' => $title = rtrim($this->faker->sentence(), '.'),
            'slug' => Str::slug($title),
            'body' => $this->faker->paragraph(5),
            'teaser' => $this->faker->sentence(),
            'published' => false,
        ];
    }

    /**
     * Set the office state as pending
     *
     * @return Factory
     */
    public function published(): Factory
    {
        return $this->state(function () {
            return [
                'published' => true
            ];
        });
    }
}
