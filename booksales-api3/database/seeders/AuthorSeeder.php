<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::create([
            'name' => 'Selenophille',
            'email' => 'selenophille@example.com'
        ]);

        Author::create([
            'name' => 'Amir',
            'email' => 'amir@example.com'
        ]);

        Author::create([
            'name' => 'Aulia Dinda',
            'email' => 'auliadinda@example.com'
        ]);

        Author::create([
            'name' => 'Resthi',
            'email' => 'resthi@example.com'
        ]);

        Author::create([
            'name' => 'Uwais',
            'email' => 'uwais@example.com'
        ]);
    }
}
