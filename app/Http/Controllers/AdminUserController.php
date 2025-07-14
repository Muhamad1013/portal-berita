<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminUserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('role', '!=', 'admin');

        // Search
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }

        // Sorting
        $sortField = in_array($request->sort_by, ['name', 'email', 'created_at']) ? $request->sort_by : 'name';
        $sortOrder = $request->sort_order === 'desc' ? 'desc' : 'asc';

        $users = $query->orderBy($sortField, $sortOrder)->paginate(10)->appends($request->all());

        return view('admin.user.index', compact('users'));
    }




    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->role === 'admin') {
            return redirect()->back()->with('error', 'Tidak bisa menghapus admin.');
        }

        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Pengguna berhasil dihapus.');
    }
}
