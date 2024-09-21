<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignMetrics extends Model
{
    use HasFactory;

    protected $fillable = [
        'interaction_type',
        'link',
        'interaction_time',
        'user_agent',
        'location',
        'campaign_id',
        'user_id',
    ];
}
