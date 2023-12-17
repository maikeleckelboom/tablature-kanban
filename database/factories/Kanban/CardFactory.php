<?php

namespace Database\Factories\Kanban;

use App\Models\Kanban\Card;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Card>
 */
class CardFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'content' => $this->faker->sentence,
            'column_id' => ColumnFactory::new()->create()->id,
        ];
    }
}
