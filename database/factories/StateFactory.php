<?php

namespace Database\Factories;

use App\Models\State;
use Illuminate\Database\Eloquent\Factories\Factory;

class StateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = State::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'state_code' =>  random_int(1, 10),
            'state_name' => $this->faker->unique()->state,
            'country_id' => random_int(1, 10),
            'status' => 1,
            'created_by' => '1',
            'system_ip' => '123.123.123.123',
        ];
    }
}
