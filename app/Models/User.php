<?php

namespace App\Models;

use App\Traits\HasUUID;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasUUID, Notifiable, SoftDeletes, HasRoles, CanResetPassword;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'email', 'password',
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
     * Get the user's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->name} {$this->surname}";
    }

    /**
     * Set the user's name
     *
     * @param  string  $value
     * @return void
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = Str::title($value);
    }

    /**
     * Set the user's surname.
     *
     * @param  string  $value
     * @return void
     */
    public function setSurnameAttribute($value)
    {
        $this->attributes['surname'] = Str::title($value);
    }

    /**
     * Set the user's surname.
     *
     * @param  string  $value
     * @return void
     */
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = Str::lower($value);
    }
}