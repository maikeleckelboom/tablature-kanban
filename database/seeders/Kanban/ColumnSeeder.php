<?php

namespace Database\Seeders\Kanban;

use App\Models\Kanban\Column;
use Illuminate\Database\Seeder;

class ColumnSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run($board): void
    {
        Column::factory(3)->create([
            'board_id' => $board,
        ]);
    }
}
