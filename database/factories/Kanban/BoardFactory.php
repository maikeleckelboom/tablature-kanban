<?php

namespace Database\Factories\Kanban;

use App\Models\Kanban\Board;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Board>
 */
class BoardFactory extends Factory
{
    private const TITLES = [
        'Personal',
        'Work',
        'Family',
        'Hobbies',
        'ProjectX',
        'TeamFlow Management',
        'SwiftTask Board',
        'ProFlow Workspace',
        'ProjectX Board',
        'KanView Pro Suite',
        'TaskHarbor Center',
        'ProjectPulse',
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->randomElement(self::TITLES),
            'user_id' => User::factory()->create(),
        ];
    }
}
