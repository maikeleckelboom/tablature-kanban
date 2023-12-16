<?php

namespace Database\Factories\Kanban;

use App\Models\Kanban\Card;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Card>
 */
class CardFactory extends Factory
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
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'content' => $this->faker->randomElement(self::CONTENT),
            'column_id' => ColumnFactory::new()->create()->id,
        ];
    }
}
