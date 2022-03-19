<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get character gender
     * 
     * @param string $value
     * @return string
     */
    public function getGenderAttribute($value)
    {
        return ucwords($value);
    }

    /**
     * Character belongs to many episodes
     */
    public function episodes()
    {
        return $this->belongsToMany(Episode::class, 'episodes_characters');
    }

    /**
     * A character has only one location
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    /**
     * A character has one status
     */
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
