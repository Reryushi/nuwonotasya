<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Rekap extends Model
{
    protected $table = 'rekap';

    protected $fillable = ['id', 'room_type_id', 'jumlah'];

    public function room_type()
    {
        return $this->belongsTo('App\Model\RoomType');
    }

}
