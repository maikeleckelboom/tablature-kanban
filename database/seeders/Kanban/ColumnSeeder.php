<?php

namespace Database\Seeders\Kanban;

use Database\Factories\Kanban\ColumnFactory;
use Illuminate\Database\Seeder;

class ColumnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run($board_id): void
    {
        ColumnFactory::new()->create([
            'board_id' => $board_id,
        ]);
    }
}
