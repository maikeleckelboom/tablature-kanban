<?php

namespace Database\Seeders\Kanban;

use App\Models\Kanban\Board;
use Illuminate\Database\Seeder;

class BoardSeeder extends Seeder
{

    const BOARD_TITLES = [
        'Personal',
        'Work',
        'Family',
    ];

    /**
     * Run the database seeds.
     */
    public function run($user_id): void
    {
        foreach (self::BOARD_TITLES as $title) {
            $board = Board::factory()->create([
                'user_id' => $user_id,
                'title' => $title,
            ]);

            $columns = $board->columns()->createMany([
                ['title' => 'To Do'],
                ['title' => 'In Progress'],
                ['title' => 'Done'],
            ]);

            $columns->each(function ($column) {

                $content = [
                    ['content' => 'Plan and execute marketing campaign for Q1.'],
                    ['content' => 'Review and optimize team processes for better efficiency.',],
                    ['content' => 'Sprint planning for the upcoming development cycle.',],
                    ['content' => 'Track and analyze project progress for client presentation.',],
                    ['content' => 'Design and implement UI improvements for the mobile app.',],
                ];

                foreach (range(1, rand(3, 5)) as $i) {
                    $column->cards()->create([
                        'content' => $content[array_rand($content)]['content']
                    ]);
                }

            });

        }
    }
}
