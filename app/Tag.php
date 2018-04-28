<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tags';

    
    /**
     * Get all of the courses that are assigned this tag.
     */
    public function courses()
    {
        return $this->morphedByMany('App\Course', 'taggable');
    }

    /**
     * Get all of the users that are assigned this tag.
     */
    public function users()
    {
        return $this->morphedByMany('App\User', 'taggable');
    }
}
