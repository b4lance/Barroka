<?php

namespace App\Http\Controllers\Publicist;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RatingStoreRequest;
use App\Rating;
use Carbon\Carbon;
use App\User;


class RatingController extends Controller
{
    public function storeRating(RatingStoreRequest $request){
    		$date=new Carbon();
    		$id=$request->publicist_id;
            $id_user = $request->user_id;
    		$date->format('Y-m-d');
    		$rating=new Rating();
    		$rating->user_id = $request->user_id;
    		$rating->publicist_id = $request->publicist_id;
    		$rating->valued = $request->valued;
    		$rating->date = $date;
    		$rating->save();

            $user = User::findOrFail($id_user);
            $user->qualification = '1';
            $user->save();
    		
    		return redirect()->route('perfil',$id)->with('success','Valoracion enviada con exito!');
    }
}
