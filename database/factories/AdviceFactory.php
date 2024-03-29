<?php

namespace Database\Factories;

use App\Models\Advice;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AdviceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Advice::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->website,
            'status' => 1,
        ];
    }
}
