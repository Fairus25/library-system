@extends('layouts.app')

@section('title', 'Data Anggota - Library System')

@section('content')
    <h2>Tambah Anggota</h2>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
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

    <form action="{{ route('members.store') }}" method="POST">
        @csrf

        <div>
            <label for="member_code">Kode Anggota:</label><br>
            <input type="text" name="member_code" id="member_code" value="{{ old('member_code') }}" placeholder="Contoh: MBR001" required>
        </div>
        <br>

        <div>
            <label for="name">Nama Anggota:</label><br>
            <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Contoh: Andi" required>
        </div>
        <br>

        <div>
            <label for="phone">No. Telepon:</label><br>
            <input type="text" name="phone" id="phone" value="{{ old('phone') }}" placeholder="Contoh: 081234567890">
        </div>
        <br>

        <div>
            <label for="address">Alamat:</label><br>
            <textarea name="address" id="address" rows="2" placeholder="Contoh: Karawang">{{ old('address') }}</textarea>
        </div>
        <br>

        <button type="submit">Simpan Anggota</button>
    </form>

    <hr>

    <h2>Daftar Anggota</h2>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Anggota</th>
                <th>Nama</th>
                <th>Telepon</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @forelse($members as $index => $member)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $member->member_code }}</td>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->phone ?? '-' }}</td>
                    <td>{{ $member->address ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Belum ada data anggota.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection