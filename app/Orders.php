<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable = ['hotel_id','guest_id','status','checkin_at','checkout_at'];
}
