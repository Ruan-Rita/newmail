<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'plan',
        'plan_limit_notify',
        'resource_created_notify',
        'user_id',
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
}