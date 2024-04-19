<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Unit;

class UnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Создание тестовых данных для таблицы единиц измерения
        Unit::create([
            'unit' => 'гр'
        ]);

        Unit::create([
            'unit' => 'мл'
        ]);

        Unit::create([
            'unit' => 'шт'
        ]);

        Unit::create([
            'unit' => 'порция'
        ]);

        Unit::create([
            'unit' => 'кг'
        ]);
    }
}
