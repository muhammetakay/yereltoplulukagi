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
        $paragraps = $this->faker->paragraphs(rand(2, 6));
        $content = "";
        foreach ($paragraps as $p) {
            $content .= "$p\r\n\r\n";
        }
        return [
            'title' => ucwords($this->faker->realText(75, 2)),
            'content' => $content,
            'category_id' => Category::all()->random()->id,
            'user_id' => User::all()->random()->id,
            'views' => rand(0, 1e3),
            'image_path' => getRandomNewsImage(),
        ];
    }
}
