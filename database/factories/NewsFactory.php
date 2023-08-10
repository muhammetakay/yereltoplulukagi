<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\News;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = News::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => ucwords($this->faker->words(3, true)),
            'content' => $this->faker->paragraphs(rand(2,5), true),
            'category_id' => Category::all()->random()->id,
            'user_id' => User::all()->random()->id,
            'views' => rand(0, 1e3),
            'image_path' => 'assets/uploads/event-1.png'
        ];
    }
}
