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

        User::factory()->create([
            'name' => 'Test User',
            'role' => 'admin',
            'email' => 'test@example.com',
            'password' => bcrypt('test'),
        ]);
        User::factory(5)->create();

        $this->call([
            PostSeeder::class,
            CategorySeeder::class,
            CategoryPostSeeder::class,
        ]);
    }
}
