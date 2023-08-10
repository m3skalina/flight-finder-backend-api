<?php

namespace Database\Factories;

use App\Models\Airport;
use App\Models\Flight;
use Illuminate\Database\Eloquent\Factories\Factory;

class FlightFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Flight::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'code_departure' => Airport::factory()->create()->code,
            'code_arrival' => Airport::factory()->create()->code,
            'price' => $this->faker->randomFloat(0, 0, 99.),
        ];
    }
}
