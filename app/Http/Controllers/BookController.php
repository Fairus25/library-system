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
        // 1. Proses Validasi
        $validatedData = $request->validate([
            'title'  => 'required|string|min:3|max:255', // rule baru: min 3 karakter, max 255
            'author' => 'required|string|min:3|max:255',
            'year'   => 'required|integer|digits:4|min:1901|max:2155', // rule baru: harus 4 digit, rentang tahun MySQL
            'stock'  => 'required|integer|min:0' // rule baru: tidak boleh minus (minimal 0)
        ]);

        // 2. Simpan jika validasi lolos
        Book::create($validatedData);
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
        // 1. Proses Validasi
        $validatedData = $request->validate([
            'title'  => 'required|string|min:3|max:255',
            'author' => 'required|string|min:3|max:255',
            'year'   => 'required|integer|digits:4|min:1901|max:2155',
            'stock'  => 'required|integer|min:0'
        ]);

        // 2. Update jika validasi lolos
        $book->update($validatedData);
        return redirect()->route('books.index');
    }

    // DELETE - Menghapus Data
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }
}