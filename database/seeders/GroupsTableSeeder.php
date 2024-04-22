<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Group;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Group::create([
            'section' => 'Напитки',
            'active' => 1,
            'sort' => 100
        ]);

        Group::create([
            'section' => 'Супы',
            'active' => 1,
            'sort' => 100
        ]);

        Group::create([
            'section' => 'Закуски',
            'active' => 1,
            'sort' => 100
        ]);
    }
}
