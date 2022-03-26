<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    //A property has one location
	public function getProperties(){
	    return $this->hasMany('App\Models\Property', '_fk_location', '__pk');
	}
}
