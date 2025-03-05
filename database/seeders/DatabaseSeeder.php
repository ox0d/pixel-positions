<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\Tag;
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
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => 'admin',
        ]);

        $this->call([
            EmployerSeeder::class,
            JobSeeder::class,
            TagSeeder::class
        ]);


        $jobs = Job::all();

        foreach ($jobs as $job) {
            $tagIds = Tag::inRandomOrder()->limit(3)->pluck('id')->toArray();
            $job->tags()->sync($tagIds);
        }
    }
}
