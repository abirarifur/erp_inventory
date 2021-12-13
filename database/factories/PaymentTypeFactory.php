<?php

namespace Database\Factories;

use App\Models\PaymentType;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PaymentType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'payment_type_code' =>  1,
            'payment_type' => 'Card',
            'company_id' => 1122,
            'status' => 1,
            'created_by' => '1',
            'system_ip' => '123.123.123.123',
        ];
    }
}
