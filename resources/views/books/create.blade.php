@extends('layouts.app')
@section('title', 'Tambah Buku Baru')
@section('content')
    <h2>Tambah Buku Baru</h2>
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div style="margin-bottom: 10px;">
            Judul: <input type="text" name="title" value="{{ old('title') }}">
            @error('title') <div style="color:red; font-size:12px;">{{ $message }}</div> @enderror
        </div>
        <div style="margin-bottom: 10px;">
            Penulis: <input type="text" name="author" value="{{ old('author') }}">
            @error('author') <div style="color:red; font-size:12px;">{{ $message }}</div> @enderror
        </div>
        <div style="margin-bottom: 10px;">
            Tahun: <input type="number" name="year" value="{{ old('year') }}">
            @error('year') <div style="color:red; font-size:12px;">{{ $message }}</div> @enderror
        </div>
        <div style="margin-bottom: 10px;">
            Stok: <input type="number" name="stock" value="{{ old('stock') }}">
            @error('stock') <div style="color:red; font-size:12px;">{{ $message }}</div> @enderror
        </div>
        <button type="submit">Simpan</button>
    </form>
    <br>
    <a href="{{ route('books.index') }}">Kembali</a>
@endsection