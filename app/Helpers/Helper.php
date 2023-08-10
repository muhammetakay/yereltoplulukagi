<?php

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