<?php

namespace Database\Factories;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => ucwords($this->faker->words(3, true)),
            'event_date' => $this->faker->dateTimeBetween(now(), now()->addYear()),
            'location' => $this->faker->city,
            'organizer' => $this->faker->company,
            'description' => $this->faker->paragraph,
            'image_path' => getRandomNewsImage()
        ];
    }
}
