<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        $categories = [
            ['name' => 'Populer', 'description' => 'Berita populer hari ini', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Nasional', 'description' => 'Berita seputar Indonesia', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Internasional', 'description' => 'Berita dunia terkini', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Terbaru', 'description' => 'Berita terbaru yang dipublikasikan', 'created_at' => $now, 'updated_at' => $now],
        ];

        DB::table('categories')->insert($categories);
    }
}