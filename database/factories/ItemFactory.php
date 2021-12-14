<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'item_code' =>  1,
            'name' => 'IT-001',
            'category_id' => 1,
            'subcategory_id' => 1,
            'sku' => '112233',
            'unit_id' => 1,
            'brand_id' => 1,
            'alert_qty' => 5,
            'lot_number' => 1,
            'expire_date' => '05/05/2025',
            'purchase_price' => 10.00,
            'tax_id' => 1,
            'price' => 10.22,
            'tax_type' => 1,
            'profit_margin' => 1,
            'sales_price' => 1,
            'item_images' => 1,
            'size_id' => 1,
            'color_id' => 1,
            'style_id' => 1,
            'company_id' => 1122,
            'warehouse_id' => 1,
            'status' => 1,
            'created_by' => '1',
            'system_ip' => '123.123.123.123',
        ];
    }
}
