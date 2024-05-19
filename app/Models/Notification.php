<?php

// app/Models/Notification.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model {
    protected $fillable = ['user_id', 'type', 'notifiable_id', 'notifiable_type', 'read_at'];

    // Define relationship with User
    public function user() {
        return $this->belongsTo(User::class);
    }

    // Define polymorphic relationship with content (Event/Blog)
    public function notifiable() {
        return $this->morphTo();
    }
}

