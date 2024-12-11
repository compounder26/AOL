<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Felicia Angel',
            'email' => 'feliciadiy88@gmail.com',
            'password' => Hash::make('12345678'),
            'phone' => '081511417588',
        ]);

        Category::create([
            'name' => 'Environment',
        ]);
        Category::create([
            'name' => 'Health',
        ]);
        Category::create([
            'name' => 'Food',
        ]);
        Category::create([
            'name' => 'Donations',
        ]);
        Category::create([
            'name' => 'Education',
        ]);
        Category::create([
            'name' => 'Miscellaneous',
        ]);
    }
}
