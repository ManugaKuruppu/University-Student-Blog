<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Club extends Model
{
    use SoftDeletes;

    protected $fillable = ['club_name'];

    /**
     * Get all events associated with this club.
     */
    public function events()
    {
        return $this->hasMany(Event::class);
    }

    /**
     * Create a new club.
     *
     * @param  array  $data
     * @return Club
     */
    public static function createClub(array $data)
    {
        return self::create($data);
    }
}
