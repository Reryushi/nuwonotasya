<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Room extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */

    use SoftDeletes;
    protected $table = 'rooms';

    protected $dates = [
        'created_at',
        'updated_at',
        
    ];
    protected $fillable = ['room_number', 'description', 'available', 'status', 'room_type_id'];


    public function room_type()
    {
        return $this->belongsTo('App\Model\RoomType');
    }

    public function room_bookings()
    {
        return $this->hasMany('App\Model\RoomBooking');
    }

    public function reviews()
    {
        return $this->hasManyThrough('App\Model\Review', 'App\Model\RoomBooking');

    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');

    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

}
