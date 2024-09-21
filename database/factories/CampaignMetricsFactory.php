<?php

namespace Database\Factories;

use App\Enum\CampaignMetrics\InteractionTypeEnum;
use App\Models\Campaign;
use App\Models\CampaignMetrics;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Campaign>
 */
class CampaignMetricsFactory extends Factory
{
    protected $model = CampaignMetrics::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $date = $this->faker->dateTimeBetween('-12 Months', 'now');
        
        return [
            'interaction_type' => InteractionTypeEnum::CLICK,
            'link' => $this->faker->url(),
            'interaction_time' => now(),
            'user_agent' => $this->faker->userAgent(),
            'location' => $this->faker->locale(),
            'user_id' => User::factory(),
            'campaign_id' => Campaign::factory(),
            'created_at' => $date,
            'updated_at' => $date,
        ];
    }

    public function clickInteraction()
    {
        return $this->state(function (array $attributes) {
            return [
                'interaction_type' => InteractionTypeEnum::CLICK,
            ];
        });
    }
    public function openInteraction()
    {
        return $this->state(function (array $attributes) {
            return [
                'interaction_type' => InteractionTypeEnum::OPEN,
            ];
        });
    }
    public function unsubscribeInteraction()
    {
        return $this->state(function (array $attributes) {
            return [
                'interaction_type' => InteractionTypeEnum::UNSUBSCRIBE,
            ];
        });
    }
    public function conversionInteraction()
    {
        return $this->state(function (array $attributes) {
            return [
                'interaction_type' => InteractionTypeEnum::CONVERSION,
            ];
        });
    }
    public function formSubmitInteraction()
    {
        return $this->state(function (array $attributes) {
            return [
                'interaction_type' => InteractionTypeEnum::FORM_SUBMIT,
            ];
        });
    }
}
