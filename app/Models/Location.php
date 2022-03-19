<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * A location has many characters
     */
    public function characters()
    {
        return $this->hasMany(Character::class);
    }
}
