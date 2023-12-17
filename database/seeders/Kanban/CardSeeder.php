<?php

namespace Database\Seeders\Kanban;

use Database\Factories\Kanban\CardFactory;
use Illuminate\Database\Seeder;

class CardSeeder extends Seeder
{
    private const CONTENT = [
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
     * Run the database seeds.
     */
    public function run($column): void
    {
        CardFactory::new()->create([
            'column_id' => $column,
            'content' => self::CONTENT[array_rand(self::CONTENT)],
        ]);
    }
}
