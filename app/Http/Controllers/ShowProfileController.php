<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ShowProfileController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);

        // Nanti bisa ditambahkan relasi komentar, berita yang ditulis, dll.
        return view('user.profile', compact('user'));
    }
}