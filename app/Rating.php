<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Publicist;

class Rating extends Model
{
    protected $fillable=[
    	'user_id','publicist_id','valued','date',
    ];

    public function user(){
    	return $this->belongsTo(User::class);
    }

     public function publicist(){
    	return $this->belongsTo(Publicist::class);
    }
}
