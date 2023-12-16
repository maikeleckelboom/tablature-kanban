<?php

namespace Database\Seeders\Kanban;

use App\Models\Kanban\Card;
use Illuminate\Database\Seeder;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run($column): void
    {
        Card::factory(2)->create([
            'column_id' => $column,
        ]);
    }
}
