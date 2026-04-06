<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fashion>
 */
class FashionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nama = $this->faker->randomElement([
            'Batik Solo',
            'Baju Adat Minang',
            'Batik Jogja',
            'Blangkon Jogja',
            'Baju Adat Bali',
            'Blangkon Solo'
        ]);

        return [
            'code' => strtoupper(Str::random(6)),
            'name' => $nama,
            'desc' => $this->faker->sentence(),
            'slug' => Str::slug($nama.'-'.Str::random(4)),
            'price_per_day' => $this->faker->numberBetween(50000,200000),
            'category_id' => 1,
            'image' => null,
            'status' => 'ready'
        ];
    }
}
