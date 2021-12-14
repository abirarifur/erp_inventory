<?php

namespace Database\Factories;

use App\Models\Expense;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExpenseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Expense::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'expense_code' =>  1,
            // 'expense_name' =>  "rent",
            'exp_category_id' => 1,
            'reference_no' => 1001,
            'expense_for' => 'car rent',
            'amount' => 100.00,
            'company_id' => 1122,
            'warehouse_id' => 1,
            'status' => 1,
            'created_by' => '1',
            'system_ip' => '123.123.123.123',
        ];
    }
}
