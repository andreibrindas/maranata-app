<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'date', 'video_mixer', 'proiectie', 'camera_1', 'camera_2', 'camera_3', 'sunet'
    ];

    public function users() {
        return $this->hasMany(User::class);
    }
}
