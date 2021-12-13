<?php

namespace Database\Factories;

use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShopFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Shop::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'shop_code' =>  1,
            'shop_name' => 'SH-001',
            'company_id' => 1122,
            'warehouse_id' => 1,
            'country_id' => 1,
            'state_id' => 1,
            'city_id' => 1,
            'address' => 'abc, dhaka',
            'status' => 1,
            'created_by' => '1',
            'system_ip' => '123.123.123.123',
        ];
    }
}
