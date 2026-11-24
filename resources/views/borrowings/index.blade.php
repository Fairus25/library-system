@extends('layouts.app')

@section('title', 'Peminjaman & Pengembalian Buku')

@section('content')
    <h2>Transaksi Peminjaman Buku</h2>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    @if($errors->any())
        <div style="color: red;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('borrowings.store') }}" method="POST">
        @csrf

        <div>
            <label for="member_id">Pilih Anggota:</label><br>
            <select name="member_id" id="member_id" required>
                <option value="">-- Pilih Anggota --</option>
                @foreach($members as $member)
                    <option value="{{ $member->id }}" {{ old('member_id') == $member->id ? 'selected' : '' }}>
                        {{ $member->member_code }} - {{ $member->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <br>

        <div>
            <label for="book_id">Pilih Buku (Stok Tersedia):</label><br>
            <select name="book_id" id="book_id" required>
                <option value="">-- Pilih Buku --</option>
                @foreach($books as $book)
                    <option value="{{ $book->id }}" {{ old('book_id') == $book->id ? 'selected' : '' }}>
                        {{ $book->title }} (Stok: {{ $book->stock }})
                    </option>
                @endforeach
            </select>
        </div>
        <br>

        <div>
            <label for="quantity">Jumlah Pinjam:</label><br>
            <input type="number" name="quantity" id="quantity" min="1" value="{{ old('quantity', 1) }}" required>
        </div>
        <br>

        <button type="submit">Simpan Peminjaman</button>
    </form>

    <hr>

    <h2>Daftar Transaksi Peminjaman & Pengembalian</h2>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Anggota</th>
                <th>Buku & Jumlah</th>
                <th>Petugas</th>
                <th>Tgl Pinjam</th>
                <th>Jatuh Tempo</th>
                <th>Tgl Kembali</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($borrowings as $index => $borrowing)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $borrowing->member->name ?? '-' }}</td>
                    <td>
                        @foreach($borrowing->details as $detail)
                            {{ $detail->book->title ?? '-' }} ({{ $detail->quantity }})<br>
                        @endforeach
                    </td>
                    <td>{{ $borrowing->user->name ?? '-' }}</td>
                    <td>{{ $borrowing->borrowing_date }}</td>
                    <td>{{ $borrowing->due_date }}</td>
                    <td>{{ $borrowing->return_date ?? '-' }}</td>
                    <td>{{ $borrowing->status }}</td>
                    <td>
                        @if($borrowing->status === 'borrowed')
                            <form action="{{ route('borrowings.return', $borrowing->id) }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit">Kembalikan</button>
                            </form>
                        @else
                            Sudah Dikembalikan
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9">Belum ada data transaksi peminjaman.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection