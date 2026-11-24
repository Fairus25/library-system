@extends('layouts.app')

@section('title', 'Dashboard - Library System')

@section('content')
    <h2>Dashboard Perpustakaan</h2>
    <p>Selamat datang, <strong>{{ auth()->user()->name ?? 'Pengguna' }}</strong> (Role: <strong>{{ auth()->user()->role ?? '-' }}</strong>).</p>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Jumlah Kategori</th>
                <th>Jumlah Buku</th>
                <th>Jumlah Anggota</th>
                <th>Total Transaksi Peminjaman</th>
                <th>Peminjaman Aktif (Borrowed)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $totalCategories }}</td>
                <td>{{ $totalBooks }}</td>
                <td>{{ $totalMembers }}</td>
                <td>{{ $totalBorrowings }}</td>
                <td>{{ $activeBorrowings }}</td>
            </tr>
        </tbody>
    </table>