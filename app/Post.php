<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'content', 'status',
    ];

    /**
     * Get the post that owns the user.
     */
    public function post()
    {
        return $this->belongsTo('App\User');
    }
}
