<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dish;

class DishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Dish::create([
            'name' => 'Блюдо',
            'description' => 'Вкусное блюдо',
            'group_id' => 7,
            'img' => '/',
            'price' => '100.00',
            'weight' => '250',
            'amount' => '1',
            'spicy' => 1,
            'sort' => 100,
            'active' => 1,
            'weight_unit_id' => 1,
            'amount_unit_id' => 3,

        ]);

        Dish::create([
            'name' => 'Блюдо',
            'description' => 'Вкусное блюдо',
            'group_id' => 8,
            'img' => '/',
            'price' => '100.00',
            'weight' => '250',
            'amount' => '1',
            'spicy' => 1,
            'sort' => 100,
            'active' => 1,
            'weight_unit_id' => 1,
            'amount_unit_id' => 3,

        ]);

        Dish::create([
            'name' => 'Блюдо',
            'description' => 'Вкусное блюдо',
            'group_id' => 9,
            'img' => '/',
            'price' => '100.00',
            'weight' => '250',
            'amount' => '1',
            'spicy' => 1,
            'sort' => 100,
            'active' => 1,
            'weight_unit_id' => 1,
            'amount_unit_id' => 3,

        ]);

        Dish::create([
            'name' => 'Блюдо',
            'description' => 'Вкусное блюдо',
            'group_id' => 7,
            'img' => '/',
            'price' => '100.00',
            'weight' => '250',
            'amount' => '1',
            'spicy' => 1,
            'sort' => 100,
            'active' => 1,
            'weight_unit_id' => 1,
            'amount_unit_id' => 3,

        ]);

        Dish::create([
            'name' => 'Блюдо',
            'description' => 'Вкусное блюдо',
            'group_id' => 8,
            'img' => '/',
            'price' => '100.00',
            'weight' => '250',
            'amount' => '1',
            'spicy' => 1,
            'sort' => 100,
            'active' => 1,
            'weight_unit_id' => 1,
            'amount_unit_id' => 3,

        ]);
    }
}
