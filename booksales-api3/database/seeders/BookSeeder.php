<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title' => 'The Bourne Identity',
        ]);

        Book::create([
            'title' => 'The Hanger Games',
        ]);

        Book::create([
            'title' => 'Jack Reacher',
        ]);

        Book::create([
            'title' => 'Red Swarrow',
        ]);

        Book::create([
            'title' => 'Mission: Black List',
        ]);
    }
}
