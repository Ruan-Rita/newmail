<?php

namespace Database\Factories;

use App\Enum\Campaign\CampaignStatusEnum;
use App\Models\Campaign;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Campaign>
 */
class CampaignFactory extends Factory
{
    protected $model = Campaign::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $date = $this->faker->date();
        
        return [
            'title' => $this->faker->name(),
            'segmentation' => $this->faker->jobTitle(),
            'status' => CampaignStatusEnum::DRAFT,
            'send_at' => $date,
            'emails_sent_count' => $this->faker->numberBetween(1000, 100000),
            'content' => $this->faker->text(),
            'user_id' => User::first()->id,
            'created_at' => $date,
            'updated_at' => $date,
        ];
    }
}
