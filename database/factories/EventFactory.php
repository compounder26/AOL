<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    protected $model = Event::class;

    public function definition()
    {
        return [
            'name' => $this->faker->sentence(3),
            'photo' => 'assets/' . $this->faker->word . '.jpg',
            'start_time' => $this->faker->dateTimeBetween('now', '+1 month'),
            'end_time' => $this->faker->dateTimeBetween('+1 month', '+2 months'),
            'organizer' => $this->faker->company,
            'notes' => $this->faker->paragraph,
            'slots' => $this->faker->numberBetween(10, 100),
            'created_by' => null, // This will be dynamically assigned
        ];
    }
}
