<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Category::truncate();
        $categories = [
            ['name' => 'Ekonomi'],
            ['name' => 'Spor'],
            ['name' => 'Finans'],
            ['name' => 'Politika'],
            ['name' => 'İş'],
            ['name' => 'Sağlık'],
            ['name' => 'Seyahat'],
            ['name' => 'Yemek'],
            ['name' => 'Eğitim'],
            ['name' => 'Yaşam'],
            ['name' => 'Bilim'],
            ['name' => 'Teknoloji'],
            ['name' => 'Oyun'],
            ['name' => 'Moda'],
            ['name' => 'Kültür Sanat'],
            ['name' => 'Astoloji'],
            ['name' => 'Sosyal Medya'],
            ['name' => 'İnternet'],
            ['name' => 'Dünya'],
            ['name' => 'Uzay'],
            ['name' => 'Hava Durumu'],
            ['name' => 'Din'],
        ];
        for ($i=0; $i < count($categories); $i++) { 
            Category::create($categories[$i]);
        }
    }
}
