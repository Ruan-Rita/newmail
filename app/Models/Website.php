<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'name',
        'subdomain',
        'publish',
        'content',
        'indexable',
        'logo_url',
        'user_id',
    ];
}
