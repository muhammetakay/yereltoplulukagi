<?php
use App\Models\Category;
use App\Models\News;

function getRandomNewsImage() {
    $images = [
        'assets/img/news-700x435-1.jpg',
        'assets/img/news-700x435-2.jpg',
        'assets/img/news-700x435-3.jpg',
        'assets/img/news-700x435-4.jpg',
        'assets/img/news-700x435-5.jpg',
        'assets/img/news-800x500-1.jpg',
        'assets/img/news-800x500-2.jpg',
        'assets/img/news-800x500-3.jpg',
    ];
    return $images[array_rand($images)];
}

function getAllCategories() {
    return Category::all();
}

function getPopularNews(int $count) {
    return News::with('category')->where('created_at', '>=', now()->subMonths())->orderByDesc('views')->take($count)->get();
}

/**
 * Turkish strtoupper
 */
function strtoupper_tr($str) 
{
    $search = array("ç","i","ı","ğ","ö","ş","ü");
    $replace = array("Ç","İ","I","Ğ","Ö","Ş","Ü");
    return strtoupper(str_replace($search, $replace, $str));
}

/**
 * Turkish ucwords
 */
function ucwords_tr($str) 
{
    $str = mb_strtolower($str);
    return str_replace('i̇','i',ltrim(mb_convert_case(str_replace(array('i','I'),array('İ','ı'),$str),MB_CASE_TITLE,'UTF-8')));
}