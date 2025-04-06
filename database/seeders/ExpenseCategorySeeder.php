<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ExpenseCategory;

class ExpenseCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        ExpenseCategory::create([
            'name' => 'Food',
            'description' => 'Expenses related to food and dining.',
        ]);

        ExpenseCategory::create([
            'name' => 'Transportation',
            'description' => 'Expenses related to travel and commuting.',
        ]);

        ExpenseCategory::create([
            'name' => 'Utilities',
            'description' => 'Expenses for electricity, water, and other utilities.',
        ]);

        ExpenseCategory::create([
            'name' => 'Entertainment',
            'description' => 'Expenses for movies, games, and other leisure activities.',
        ]);

        ExpenseCategory::create([
            'name' => 'Healthcare',
            'description' => 'Expenses for medical and health-related needs.',
        ]);
    }
}
