<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'discount', 'tuition_fee', 'user_id',
    ];

    /**
     * Get the course that owns the user.
     */
    public function course()
    {
        return $this->belongsTo('App\User');
    }
}
