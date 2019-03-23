<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class GuestController extends Controller
{
    public function verify($code)
	{
    $user = User::where('confirmation_code', $code)->first();

    if (! $user){
        return redirect('/');
    }else{
    $user->confirmed = true;
    $user->confirmation_code = null;
    $user->save();

    return redirect('login')->with('success', 'Has confirmado correctamente tu correo! Bienvenido a Barroka :D');
	}
    }
}
