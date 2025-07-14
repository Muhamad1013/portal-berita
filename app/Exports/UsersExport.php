<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return User::select('name', 'email', 'role', 'created_at')->get()->map(function ($user) {
            return [
                'Nama' => $user->name,
                'Email' => $user->email,
                'Role' => ucfirst($user->role),
                'Bergabung' => $user->created_at->format('d-m-Y'),
            ];
        });
    }

    public function headings(): array
    {
        return ['Nama', 'Email', 'Role', 'Bergabung'];
    }
}
