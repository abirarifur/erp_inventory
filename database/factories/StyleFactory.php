<?php

namespace Database\Factories;

use App\Models\Style;
use Illuminate\Database\Eloquent\Factories\Factory;

class StyleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Style::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'style_code' =>  1,
            'style_name' => 'fixed',
            'company_id' => 1122,
            'status' => 1,
            'created_by' => '1',
            'system_ip' => '123.123.123.123',
        ];
    }
}
