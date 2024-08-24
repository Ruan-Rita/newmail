<?php

use App\Enum\Campaign\CampaignStatusEnum;
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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('segmentation')->nullable();
            $table->enum('status', array_map(fn($case) => $case->value, CampaignStatusEnum::cases()))->nullable()->default(CampaignStatusEnum::DRAFT);
            $table->dateTime('send_at');
            $table->text('content')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};
