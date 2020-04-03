<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = ['name','address','latitude','longitude'];

    public function rooms(){
    	return $this->hasMany(Room::class);
    }
}
