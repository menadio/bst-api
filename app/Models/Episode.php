<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /** 
     * Episode has many characters 
     * */
    public function characters()
    {
        return $this->belongsToMany(Character::class, 'episodes_characters');
    }

    /**
     * Episode has many comments
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
