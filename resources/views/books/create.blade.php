@extends('layouts.app')
@section('title', 'Tambah Buku Baru')
@section('content')
    <h2>Tambah Buku Baru</h2>
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div>Judul: <input type="text" name="title" required></div>
        <div>Penulis: <input type="text" name="author" required></div>
        <div>Tahun: <input type="number" name="year" required></div>
        <div>Stok: <input type="number" name="stock" required></div>
        <button type="submit">Simpan</button>
    </form>
    <br>
    <a href="{{ route('books.index') }}">Kembali</a>
@endsection