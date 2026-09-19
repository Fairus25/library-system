<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard Library System';
        $description = 'Selamat datang di Sistem Informasi Perpustakaan. Berikut adalah ringkasan data saat ini:';
        $bookCount = 5;
        $categoryCount = 5;
        $memberCount = 5;

        return view('dashboard.index', compact('title', 'description', 'bookCount', 'categoryCount', 'memberCount'));
    }
}