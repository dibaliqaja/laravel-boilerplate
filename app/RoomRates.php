<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomRates extends Model
{
    protected $fillable = ['room_id','date','price'];
}
