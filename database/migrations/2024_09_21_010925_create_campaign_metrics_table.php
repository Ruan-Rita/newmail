<?php

use App\Enum\CampaignMetrics\InteractionTypeEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('campaign_metrics', function (Blueprint $table) {
            $table->id();
            $table->enum('interaction_type', array_map(fn ($case) => $case->value, InteractionTypeEnum::cases()));
            $table->string('link')->nullable();
            $table->timestamp('interaction_time')->nullable();
            $table->text('user_agent')->nullable();
            $table->string('location')->nullable();
            
            $table->unsignedBigInteger('campaign_id');
            $table->unsignedBigInteger('user_id');
            
            $table->foreign('campaign_id')->references('id')->on('campaigns')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaign_metrics');
    }
};
