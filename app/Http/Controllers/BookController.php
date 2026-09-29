<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book; // Import Model Book

class BookController extends Controller
{
   public function index()
    {
        $books = Book::all(); // Mengambil semua data dari database
        return view('books.index', compact('books'));
    }

    // Method baru untuk melihat detail buku berdasarkan ID
    public function show($id)
    {
        return view('books.show', compact('id'));
    }
}