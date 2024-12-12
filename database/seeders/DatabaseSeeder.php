<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Event;
use App\Models\Category;
use App\Models\UserEvent;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create 5 users
        $users = [
            [
                'name' => 'Felicia Angel',
                'email' => 'feliciadiy88@gmail.com',
                'password' => Hash::make('12345678'),
                'phone' => '081511417588'
            ],
            [
                'name' => 'John Doe', 
                'email' => 'john.doe@example.com',
                'password' => Hash::make('12345678'),
                'phone' => '081234567890'
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane.smith@example.com', 
                'password' => Hash::make('12345678'),
                'phone' => '089876543210'
            ],
            [
                'name' => 'Mike Johnson',
                'email' => 'mike.j@example.com',
                'password' => Hash::make('12345678'),
                'phone' => '087654321098'
            ],
            [
                'name' => 'Sarah Wilson',
                'email' => 'sarah.w@example.com',
                'password' => Hash::make('12345678'),
                'phone' => '082345678901'
            ]
        ];

        foreach ($users as $userData) {
            User::create($userData);
        }

        // Create categories
        $categories = [
            'Environment',
            'Health', 
            'Food',
            'Donations',
            'Education',
            'Miscellaneous'
        ];

        foreach ($categories as $categoryName) {
            Category::create(['name' => $categoryName]);
        }

        // Create 20 events
        $eventTitles = [
            'Beach Cleanup Drive',
            'Health & Wellness Expo',
            'Food Festival 2024',
            'Charity Gala Night',
            'Tech Education Summit',
            'Green Earth Workshop',
            'Mental Health Awareness',
            'Street Food Fair',
            'Children\'s Charity Run',
            'Digital Learning Conference',
            'Environmental Summit',
            'Healthcare Innovation',
            'Culinary Workshop',
            'Fundraising Concert',
            'Education Fair',
            'Tree Planting Event',
            'Fitness Convention',
            'International Food Fest',
            'Art for Charity',
            'STEM Education Day'
        ];

        $locations = [
            'Jakarta Convention Center',
            'Bali International Convention Centre',
            'ICE BSD City',
            'Grand City Surabaya',
            'Bandung Convention Center'
        ];

        for ($i = 0; $i < 20; $i++) {
            Event::create([
                'user_id' => rand(1, 5), // Random user as creator
                'category_id' => rand(1, 6),
                'title' => $eventTitles[$i],
                'dateTime' => date('Y-m-d', strtotime('+' . rand(1, 60) . ' days')),
                'organizer' => 'Event Organizer ' . ($i + 1),
                'orgEmail' => 'organizer' . ($i + 1) . '@example.com',
                'location' => $locations[array_rand($locations)],
                'image' => 'storage/images/' . ($i + 1) . '.jpg',
                'description' => 'This is a detailed description for ' . $eventTitles[$i] . '. Join us for an amazing experience!',
                'note' => rand(0, 1) ? 'Please bring your own water bottle' : null,
                'quota' => rand(50, 200)
            ]);
        }

        // Register users to events (each user registers to 2-4 events)
        foreach (range(1, 5) as $userId) {
            // Get random number of events (2-4) for this user
            $numberOfEvents = rand(2, 4);
            
            // Get random event IDs
            $eventIds = Event::inRandomOrder()
                            ->limit($numberOfEvents)
                            ->pluck('id');

            // Create registrations
            foreach ($eventIds as $eventId) {
                UserEvent::create([
                    'user_id' => $userId,
                    'event_id' => $eventId
                ]);
            }
        }
    }
}
