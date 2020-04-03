<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['name','quantity','price','hotel_id'];

    public function hotel(){
    	return $this->belongsTo(Hotel::class);
    }
}
