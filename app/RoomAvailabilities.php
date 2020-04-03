<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomAvailabilities extends Model
{
    protected $fillable = ['room_id','date','quantity'];
}
