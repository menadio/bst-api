<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * A comment belongs to an episode
     */
    public function episode()
    {
        return $this->belongsTo(Episode::class);
    }

    /**
     * A comment belongs to a user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
