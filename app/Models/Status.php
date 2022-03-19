<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get status name
     * 
     * @param string $value
     * @return string
     */
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * A status belongs to many characters
     */
    public function characters()
    {
        return $this->hasMany(Character::class);
    }
}
