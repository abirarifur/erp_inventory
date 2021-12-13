<?php

namespace Database\Factories;

use App\Models\Sms;
use Illuminate\Database\Eloquent\Factories\Factory;

class SmsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sms::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'info' => 'Card',
            'key' => 'Card',
            'key_value' => 'Card',
            'delete_bit' => 11111,
            'company_id' => 1122,
            'status' => 1,
            'created_by' => '1',
            'system_ip' => '123.123.123.123',
        ];
    }
}
