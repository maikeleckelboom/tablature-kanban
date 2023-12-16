<?php

namespace Database\Factories\Kanban;

use App\Models\Kanban\Column;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Column>
 */
class ColumnFactory extends Factory
{
    private const TITLES = [
        'To Do',
        'In Progress',
        'Done',
        'Misc',
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
            'board_id' => BoardFactory::new()->create()->id,
        ];
    }
}
