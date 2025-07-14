<?php

namespace App\Exports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CategoryExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Category::all()->map(function ($item) {
            return [
                'Nama Kategori' => $item->name,
                'Dibuat Pada' => $item->created_at->format('d-m-Y'),
            ];
        });
    }

    public function headings(): array
    {
        return ['Nama Kategori', 'Dibuat Pada'];
    }
}