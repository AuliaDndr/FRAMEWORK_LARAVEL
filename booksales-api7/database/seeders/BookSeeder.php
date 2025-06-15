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
            'title' => 'Harry Potter and the Sorcerer\'s Stone',
            'description' => 'Harry Potter, anak yatim piatu, masuk sekolah sihir hogwarts dan menemukan jadi dirinya serta menghadapi ancaman dari penyihir jahat, Voldemort.',
            'price' => 50000,
            'stock' => 50,
            'cover_photo' => 'harry_potter.jpg',
            'genre_id' => 1,
            'author_id' => 1, 
        ]);

        Book::create([
            'title' => 'The Shining',
            'description' => 'Jack Torrance bekerja di hotel terpencil yang angker dan perlahan kehilangan akal karena kekuatan jahat yang menghantui tempat itu.',
            'price' => 25000,
            'stock' => 30,
            'cover_photo' => 'The_Shining.jpg',
            'genre_id' => 2,
            'author_id' => 2,
        ]);

        Book::create([
            'title' => 'Laskar Pelangi',
            'description' => 'Kisah 10 anak miskin di Belitung yang penuh semangat belajar di sekolah sederhana, menghadapi berbagai tantangan hidup.',
            'price' => 40000,
            'stock' => 75,
            'cover_photo' => 'laskar_pelangi.jpg',
            'genre_id' => 3,
            'author_id' => 3,
        ]);
        
        Book::create([
            'title' => 'Asal kau bahagia',
            'description' => 'Kisah cinta yang penuh liku antara dua insan yang saling mencintai namun harus berpisah demi kebahagiaan masing-masing.',
            'price' => 30000,
            'stock' => 80,
            'cover_photo' => 'asal_kau_bahagia.jpg',
            'genre_id' => 4,
            'author_id' => 4,
        ]);
    }
}
