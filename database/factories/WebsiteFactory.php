<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Website;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class WebsiteFactory extends Factory
{
    protected $model = Website::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->title(),
            'name' => $this->faker->words(3, true),
            'subdomain' => $this->faker->domainName(),
            'publish' => now(),
            'indexable' => false,
            'logo_url' => $this->faker->imageUrl(),
            'user_id' => User::factory(),
        ];
    }
}
