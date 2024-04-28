<?php

namespace App\Model;

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
        'name', 'nik', 'password', 'gender', 'email', 'phone'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function room_bookings()
    {
        return $this->hasMany('App\Model\RoomBooking');
    }

    public function event_bookings()
    {
        return $this->hasMany('App\Model\EventBooking');
    }
}
