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

    private const CARD_CONTENT = [
        'Plan and execute marketing campaign for Q1.',
        'Review and optimize team processes for better efficiency.',
        'Sprint planning for the upcoming development cycle.',
        'Track and analyze project progress for client presentation.',
        'Design and implement UI improvements for the mobile app.',
        'Collaborate with cross-functional teams on the new feature rollout.',
        'Integrate task management with external project tools.',
        'Monitor project health and address any blockers in the workflow.',
        'Coordinate with stakeholders for user acceptance testing (UAT).',
        'Upgrade Kanban board with advanced reporting and analytics features.',
    ];

    /**
     *
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

                foreach (range(1, rand(3, 5)) as $i) {
                    $column->cards()->create([
                        'content' => self::CARD_CONTENT[array_rand(self::CARD_CONTENT)],
                    ]);
                }
            });

        }
    }
}
