<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@library.com',
        ]);

        User::factory()->create([
            'name' => 'Staff User',
            'email' => 'staff@library.com',
        ]);

        // Seed books
        $this->call([
            BooksTableSeeder::class,
        ]);
    }
}
