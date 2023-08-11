<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\News;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        News::truncate();
        Comment::truncate();
        $newsList = News::factory(100)->create();
        foreach ($newsList as $item) {
            Comment::factory(rand(0, 5))->create([
                'news_id' => $item->id,
            ]);
        }
    }
}