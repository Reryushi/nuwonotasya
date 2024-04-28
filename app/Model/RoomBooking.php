<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class RoomBooking extends Model
{
    /**
 * The table associated with the model.
 *
 * @var string
 */
    use SoftDeletes;
    protected $table = 'room_bookings';

    protected $dates = ['deleted_at'];
    protected $fillable = ['start_time', 'end_time', 'room_cost', 'status', 'payment', 'room_id', 'user_id'];

    /**
     * Get the gallery that owns the image.
     */
    public function user()
    {
        return $this->belongsTo('App\Model\User');
    }

    public function room()
    {
        return $this->belongsTo('App\Model\Room');
    }

    public function review()
    {
        return $this->hasOne('App\Model\Review');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');

    }

    
}
