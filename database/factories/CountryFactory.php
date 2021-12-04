<?php

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;
// use Illuminate\Support\Number;
class CountryFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Country::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'country_code' =>  random_int(1, 10),
            'country_name' => $this->faker->unique()->country,
            'status' => 1,
            'created_by' => '1',
            'system_ip' => '123.123.123.123',
        ];
    }
}
