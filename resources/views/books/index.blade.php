@extends('layouts.app')
@section('title', 'Daftar Buku')
@section('content')
    <h2>Daftar Buku</h2>
    <a href="{{ route('books.create') }}">+[Tambah Buku Baru]</a>
    <br><br>
    <ul>
        @foreach($books as $book)
            <li>
                {{ $book->title }} (Penulis: {{ $book->author }}, Tahun: {{ $book->year }}, Stok: {{ $book->stock }})
                
                <!-- Tombol Edit -->
                <a href="{{ route('books.edit', $book->id) }}">[Edit]</a>

                <!-- Tombol Hapus -->
                <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin ingin menghapus?')">[Hapus]</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection