<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'birthday', 'gender', 'profile_picture', 'experience', 'url', 'expectation',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the courses for the user.
     */
    public function courses()
    {
        return $this->hasMany('App\Course');
    }

    public function addCourse(Course $course)
    {
        return $this->courses()->save($course);
    }

    /**
     * Get all of the tags for the user.
     */
    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable');
    }
}
