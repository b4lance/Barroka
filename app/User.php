<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Publicist;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'email','username','password','term_services','role','confirmation_code','qualification','pass_reset',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function publicist(){
        return $this->hasOne(Publicist::class);
    }

    public function publicists(){
        return $this->belongsToMany(Publicist::class,'ratings');
    }
}
