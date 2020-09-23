<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)->create();
        Book::factory(5)->create();
        Rating::factory(5)->create();
    }
}
