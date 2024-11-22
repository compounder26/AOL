<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Generate 5 Random Users
        $users = User::factory()->count(5)->create();

        // Generate 10 Random Events
        $events = Event::factory()
            ->count(10)
            ->state(function () use ($users) {
                return [
                    'created_by' => $users->random()->id, // Assign a random user as creator
                ];
            })
            ->create();

        // Assign Users to Events
        foreach ($users as $user) {
            // Randomly Assign User to Create Some Events
            $user->createdEvents()->saveMany($events->random(2));

            // Randomly Register User to Some Events
            $user->events()->attach($events->random(3));
        }
    }
}
