@extends('layouts.app')
@section('title', 'Edit Buku')
@section('content')
    <h2>Edit Buku</h2>
    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>Judul: <input type="text" name="title" value="{{ $book->title }}" required></div>
        <div>Penulis: <input type="text" name="author" value="{{ $book->author }}" required></div>
        <div>Tahun: <input type="number" name="year" value="{{ $book->year }}" required></div>
        <div>Stok: <input type="number" name="stock" value="{{ $book->stock }}" required></div>
        <button type="submit">Update</button>
    </form>
    <br>
    <a href="{{ route('books.index') }}">Kembali</a>
@endsection