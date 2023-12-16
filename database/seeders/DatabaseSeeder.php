<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\Kanban\BoardSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $user = User::factory()->create([
            'email' => 'test@gmail.com',
            'password' => bcrypt('secret'),
            'name' => 'Test User #1',
        ]);

        $this->callWith(BoardSeeder::class, ['user_id' => $user->id]);
    }
}
