<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Gender;
use App\City;
use App\User;

class Publicist extends Model
{
    protected $fillable=[
    	'user_id','province_id','city_id','fancy_name','gender_id','zone','age','height','measurements','schedules','phone','rate','payment_methods','facebook','twitter','instagram','presentation','main_photo','img2','img3','img4','img5',
  	];

  	 public function scopeGender($query, $gender){
        if($gender)
        return $query->where('gender','LIKE',"%$gender%");
    }

    public function scopeProvince($query, $province){
        if($province)
        return $query->where('province_id','LIKE',"%$province%");
    }

    public function scopeCity($query, $city){
        if($city)
        return $query->where('city_id','LIKE',"%$city%");
    }

    public function City(){
        return $this->belongsTo(City::class);
    }

    public function Gender(){
        return $this->belongsTo(Gender::class);
    }

     public function Province(){
        return $this->belongsTo(Province::class);
    }

    public function User(){
        return $this->belongsTo(User::class);
    }
}
