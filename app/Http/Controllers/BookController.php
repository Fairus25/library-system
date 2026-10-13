<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    // READ - Menampilkan Daftar Buku
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    // CREATE - Menampilkan Form Tambah Buku
    public function create()
    {
        return view('books.create');
    }

    // STORE - Menyimpan Data Buku Baru
    public function store(Request $request)
    {
        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'year' => $request->year,
            'stock' => $request->stock,
        ]);
        return redirect()->route('books.index');
    }

    // SHOW - Menampilkan Detail Buku (biarkan kosong / standar dulu)
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    // EDIT - Menampilkan Form Edit
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    // UPDATE - Menyimpan Perubahan Data
    public function update(Request $request, Book $book)
    {
        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'year' => $request->year,
            'stock' => $request->stock,
        ]);
        return redirect()->route('books.index');
    }

    // DELETE - Menghapus Data
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }
}