<?php

namespace App\Http\Controllers\Publicist;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PublicistStoreRequest;
use App\Http\Requests\PublicistUpdateRequest;
use Illuminate\Support\Facades\Storage;

use App\Publicist;
use App\User;
use DB;
use App\Gender;
use App\Rating;

class PublicistController extends Controller
{

    public function __construct(){
        $this->middleware('editpublicist',['only'=>'editar']);
        $this->middleware('publicist',['only'=>'nuevo']);
    }

    public function perfil($id){
        $ratings=Rating::where('publicist_id',$id)->get();
        $publicist=Publicist::findOrFail($id);
        $id_user=$publicist->id;
        $user=User::where('id',$id_user);
        return view('publicist.perfil',compact('publicist','ratings','user'));
    }

    public function nuevo(){
        
        $provinces= DB::table('provinces')->orderBy('provincia',"asc")->get();
        return view('publicist.nuevoperfil',compact('provinces'));
    }

    public function editar($id){
       
        $publicist = Publicist::findOrFail($id);
        $provinces= DB::table('provinces')->orderBy('provincia',"asc")->get();
    	return view('publicist.editarperfil',compact('publicist','provinces'));
    }

     public function byProvince($id){
        return DB::table('cities')->where('id_privincia',$id)->orderBy('localidad','ASC')->get();
    }

    public function storePublicist(PublicistStoreRequest $request){
      
        $publicist = new Publicist();
        $publicist->user_id = $request->standar_id;
        $publicist->province_id = $request->province_id;
        $publicist->city_id = $request->city_id;
        $publicist->fancy_name = $request->fancy_name;
        $publicist->gender = $request->gender;
        $publicist->zone = $request->zone;
        $publicist->age = $request->age;
        $publicist->height = $request->height;
        $publicist->measurements = $request->measurements;
        $publicist->schedules = $request->schedules;
        $publicist->phone = $request->phone;
        $publicist->rate = $request->rate;
        $publicist->payment_methods = $request->payment_methods;
        $publicist->facebook = $request->facebook;
        $publicist->twitter = $request->twitter;
        $publicist->instagram = $request->instagram; 
        $publicist->presentation = $request->presentation;   
        $publicist->save();

        $id=$publicist->user_id;

        $user=User::find($id);
        $user->profile='SI';
        $user->save();
        //Foto
        if($request->file('main_photo')){

        $imagen1=Storage::disk('public')->put('img',$request->file('main_photo'));
        $publicist->fill(['main_photo'=>asset($imagen1)])->save();
        
        }


        if($request->file('img2')){
               $imagen2=Storage::disk('public')->put('img',$request->file('img2'));
               $publicist->fill(['img2'=>asset($imagen2)])->save();  
        }


        if($request->file('img3')){
             $imagen3=Storage::disk('public')->put('img',$request->file('img3'));
             $publicist->fill(['img3'=>asset($imagen3)])->save();
        }


        if($request->file('img4')){
             $imagen4=Storage::disk('public')->put('img',$request->file('img4'));
             $publicist->fill(['img4'=>asset($imagen4)])->save();
        }


        if($request->file('img5')){
             $imagen5=Storage::disk('public')->put('img',$request->file('img5'));
             $publicist->fill(['img5'=>asset($imagen5)])->save();
        }

        return redirect()->route('home')->with('success','Perfil guardado con exito, en las proximas horas el equipo de Barroka verificara sus datos para la activación de su perfil :D');   

    }


     public function updatePublicist(PublicistUpdateRequest $request,$id){
        
        $publicist = Publicist::findOrFail($id);
        $publicist->province_id = $request->province_id;
        $publicist->city_id = $request->city_id;
        $publicist->fancy_name = $request->fancy_name;
        $publicist->gender = $request->gender;
        $publicist->zone = $request->zone;
        $publicist->age = $request->age;
        $publicist->height = $request->height;
        $publicist->measurements = $request->measurements;
        $publicist->schedules = $request->schedules;
        $publicist->phone = $request->phone;
        $publicist->rate = $request->rate;
        $publicist->payment_methods = $request->payment_methods;
        $publicist->facebook = $request->facebook;
        $publicist->twitter = $request->twitter;
        $publicist->instagram = $request->instagram; 
        $publicist->presentation = $request->presentation;   
        $publicist->save();

       
        $id=$publicist->user_id;

        //Foto
        if($request->file('main_photo')){

        $imagen1=Storage::disk('public')->put('img',$request->file('main_photo'));
        $publicist->fill(['main_photo'=>asset($imagen1)])->save();
        
        }


        if($request->file('img2')){
               $imagen2=Storage::disk('public')->put('img',$request->file('img2'));
               $publicist->fill(['img2'=>asset($imagen2)])->save();  
        }


        if($request->file('img3')){
             $imagen3=Storage::disk('public')->put('img',$request->file('img3'));
             $publicist->fill(['img3'=>asset($imagen3)])->save();
        }


        if($request->file('img4')){
             $imagen4=Storage::disk('public')->put('img',$request->file('img4'));
             $publicist->fill(['img4'=>asset($imagen4)])->save();
        }


        if($request->file('img5')){
             $imagen5=Storage::disk('public')->put('img',$request->file('img5'));
             $publicist->fill(['img5'=>asset($imagen5)])->save();
        }

        return redirect()->route('home')->with('success','Perfil editado con exito, sigue disfrutando de Barroka');   

    }

    public function updateStatus(Request $request,$id){
        $this->middleware('admin');
        $publicist = Publicist::findOrFail($id);
        $publicist->profile_status = $request->get('profile');
        $publicist->save();

        return redirect()->route('admin')->with('success','Status modificado con exito');   
    }
}
