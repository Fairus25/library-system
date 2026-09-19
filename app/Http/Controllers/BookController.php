<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        // Membuat data array dummy 5 buku
        $books = [
            ['id' => 1, 'judul' => 'Pemrograman PHP', 'penulis' => 'Andi', 'tahun' => 2020],
            ['id' => 2, 'judul' => 'Laravel untuk Pemula', 'penulis' => 'Budi', 'tahun' => 2021],
            ['id' => 3, 'judul' => 'Basis Data', 'penulis' => 'Citra', 'tahun' => 2019],
            ['id' => 4, 'judul' => 'Algoritma dan Pemrograman', 'penulis' => 'Dewi', 'tahun' => 2022],
            ['id' => 5, 'judul' => 'Pemrograman Berorientasi Objek', 'penulis' => 'Eko', 'tahun' => 2023]
        ];

        return view('books.index', compact('books'));
    }

    // Method baru untuk melihat detail buku berdasarkan ID
    public function show($id)
    {
        return view('books.show', compact('id'));
    }
}