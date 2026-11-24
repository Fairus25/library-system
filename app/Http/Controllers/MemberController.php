<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::orderBy('name')->get();
        return view('members.index', compact('members'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'member_code' => 'required|string|max:50|unique:members,member_code',
            'name'        => 'required|string|max:255',
            'phone'       => 'nullable|string|max:30',
            'address'     => 'nullable|string',
        ]);

        Member::create([
            'member_code' => $request->member_code,
            'name'        => $request->name,
            'phone'       => $request->phone,
            'address'     => $request->address,
        ]);

        return redirect()
            ->route('members.index')
            ->with('success', 'Data anggota berhasil ditambahkan.');
    }
}