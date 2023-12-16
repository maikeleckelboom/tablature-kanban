<?php

namespace Database\Seeders\Kanban;

use App\Models\Kanban\Board;
use App\Models\Kanban\Column;
use Illuminate\Database\Seeder;

class BoardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run($user_id): void
    {
        Board::factory()->create([
            'user_id' => $user_id,
        ])->each(function ($board) {
            $this->callWith(ColumnSeeder::class, ['board' => $board->id]);

            Column::all()->each(function ($column) {
                $this->callWith(CardSeeder::class, ['column' => $column->id]);
            });
        });
    }
}
