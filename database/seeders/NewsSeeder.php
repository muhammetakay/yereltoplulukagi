<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\News;
use App\Models\User;
use Carbon\Carbon;
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
            $date = Carbon::createFromTimestamp(rand($item->created_at->timestamp, now()->timestamp));
            for ($i = 0; $i < rand(0, 5); $i++) {
                Comment::factory()->create([
                    'news_id' => $item->id,
                    'created_at' => $date,
                    'updated_at' => $date
                ]);
                $date = Carbon::createFromTimestamp(rand($date->timestamp, now()->timestamp));
            }
        }
    }
}