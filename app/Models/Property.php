<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

	//A property has one location
	public function getLocation(){
	    return $this->belongsTo('App\Models\Location', '_fk_location', '__pk');
	}

	//First argument model, 2nd fk at related, 3rd primary key local or foreign??
	public function getBookings(){
	    return $this->hasMany('App\Models\Booking', '_fk_property', '__pk');
	}
	
}
