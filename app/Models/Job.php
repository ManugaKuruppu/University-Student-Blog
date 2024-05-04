<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use HasFactory, SoftDeletes;

    // Specify the fields that are mass assignable
    protected $fillable = [
        'title',
        'description',
        'type',
        'location',
        'cover_image'
    ];

    public function getCoverImageUrlAttribute()
    {
        return $this->cover_image ? asset('storage/' . $this->cover_image) : asset('storage/default.png');
    }

    protected $dates = ['deleted_at'];
}
