<?php

namespace Database\Seeders\Kanban;

use Database\Factories\Kanban\CardFactory;
use Illuminate\Database\Seeder;

class CardSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run($column): void
    {
        CardFactory::new()->create([
            'column_id' => $column,
        ]);
    }
}
