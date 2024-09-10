<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Testimonial;
use App\Models\Topic;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Category::factory(10)->create();
        Contact::factory(6)->create();
        Testimonial::factory(6)->create();
        Topic::factory(20)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
