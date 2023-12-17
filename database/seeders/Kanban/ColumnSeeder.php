<?php

namespace Database\Seeders\Kanban;

use Database\Factories\Kanban\ColumnFactory;
use Illuminate\Database\Seeder;

class ColumnSeeder extends Seeder
{
    private const TITLES = [
        'To Do',
        'In Progress',
        'Done',
    ];

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
