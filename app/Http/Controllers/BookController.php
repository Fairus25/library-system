<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;

class BookController extends Controller
{
    // INDEX - Menampilkan daftar buku beserta nama kategorinya
    public function index()
    {
        $books = Book::with('category')->get();
        return view('books.index', compact('books'));
    }

    // CREATE - Menampilkan form tambah buku dengan pilihan kategori
    public function create()
    {
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }

    // STORE - Menyimpan data buku baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title'       => 'required|string|min:3|max:255',
            'author'      => 'required|string|min:3|max:255',
            'year'        => 'required|integer|digits:4|min:1901|max:2155',
            'stock'       => 'required|integer|min:0'
        ]);

        Book::create($validatedData);

        return redirect()->route('books.index');
    }

    // SHOW - Menampilkan detail buku
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    // EDIT - Menampilkan form edit buku dengan daftar kategori
    public function edit(Book $book)
    {
        $categories = Category::all();
        return view('books.edit', compact('book', 'categories'));
    }

    // UPDATE - Menyimpan perubahan data buku
    public function update(Request $request, Book $book)
    {
        $validatedData = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title'       => 'required|string|min:3|max:255',
            'author'      => 'required|string|min:3|max:255',
            'year'        => 'required|integer|digits:4|min:1901|max:2155',
            'stock'       => 'required|integer|min:0'
        ]);

        $book->update($validatedData);

        return redirect()->route('books.index');
    }

    // DESTROY - Menghapus data buku
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index');
    }
}