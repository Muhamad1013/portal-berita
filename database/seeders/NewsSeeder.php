<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{


    public function run(): void
    {
        $now = Carbon::now();

        $author_id = 1;

        // 30 Berita Nasional
        for ($i = 1; $i <= 30; $i++) {
            $content = "Ini adalah isi berita nasional nomor $i. Berisi informasi lengkap dan menarik terkait perkembangan terkini di Indonesia.";

            $newsId = DB::table('news')->insertGetId([
                'title' => 'Berita Nasional ' . $i,
                'content' => $content,
                'gambar' => 'lokal' . $i . '.jpg',
                'author_id' => $author_id,
                'created_at' => $now,
                'updated_at' => $now,
            ]);

            DB::table('category_news')->insert([
                ['news_id' => $newsId, 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now], // Populer
                ['news_id' => $newsId, 'category_id' => 2, 'created_at' => $now, 'updated_at' => $now], // Nasional
                ['news_id' => $newsId, 'category_id' => 4, 'created_at' => $now, 'updated_at' => $now], // Terbaru
            ]);
        }

        // 20 Berita Internasional
        for ($i = 31; $i <= 50; $i++) {
            $content = "Ini adalah isi berita internasional nomor " . ($i - 30) . ". Berita terbaru dan terpopuler dari berbagai negara di dunia.";

            $newsId = DB::table('news')->insertGetId([
                'title' => 'Berita Internasional ' . ($i - 30),
                'content' => $content,
                'gambar' => 'lokal' . $i . '.jpg',
                'author_id' => $author_id,
                'created_at' => $now,
                'updated_at' => $now,
            ]);

            DB::table('category_news')->insert([
                ['news_id' => $newsId, 'category_id' => 1, 'created_at' => $now, 'updated_at' => $now], // Populer
                ['news_id' => $newsId, 'category_id' => 3, 'created_at' => $now, 'updated_at' => $now], // Internasional
                ['news_id' => $newsId, 'category_id' => 4, 'created_at' => $now, 'updated_at' => $now], // Terbaru
            ]);
        }
    }

}