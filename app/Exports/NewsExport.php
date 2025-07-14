<?php

namespace App\Exports;

use App\Models\News;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class NewsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return News::with('categories')->get()->map(function ($news) {
            return [
                'Judul' => $news->title,
                'Kategori' => $news->categories->pluck('name')->join(', '),
                'Tanggal' => $news->created_at->format('d-m-Y'),
            ];
        });
    }

    public function headings(): array
    {
        return ['Judul', 'Kategori', 'Tanggal'];
    }
}
