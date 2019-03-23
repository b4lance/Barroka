<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\CuentaResetRequest;

class UserController extends Controller
{
    public function cuenta(){
    	return view('cuenta');
    }

    public function CuentaReset(CuentaResetRequest $request){
    	$id=auth()->user()->id;
    	$user=User::findOrFail($id);
    	$pass_reset=$user->pass_reset;
    	if($pass_reset == $request->pass_reset){
    		
    		$user->password = bcrypt($request->password);
    		$user->pass_reset = $request->password;
    		$user->save();

    		return redirect()->route('cuenta')->with('nice','Contraseña cambiada con exito');

    	}else{

    		return redirect()->route('cuenta')->with('error','La contraseña actual no coincide con la indicada');
    	}
    }


}
