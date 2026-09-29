<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book; // Pastikan ini ditambahkan

class BookSeeder extends Seeder
{
    public function run()
    {
        Book::create(['title' => 'Pemrograman PHP', 'author' => 'Andi', 'year' => 2020, 'stock' => 10]);
        Book::create(['title' => 'Laravel untuk Pemula', 'author' => 'Budi', 'year' => 2021, 'stock' => 15]);
        Book::create(['title' => 'Basis Data', 'author' => 'Citra', 'year' => 2019, 'stock' => 8]);
        Book::create(['title' => 'Algoritma dan Pemrograman', 'author' => 'Dewi', 'year' => 2022, 'stock' => 20]);
        Book::create(['title' => 'Pemrograman Berorientasi Objek', 'author' => 'Eko', 'year' => 2023, 'stock' => 12]);
    }
}