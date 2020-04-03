<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderGuests extends Model
{
    protected $fillable = ['order_id','name','email','phone'];
}
