<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gender;
use App\Publicist;
use DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

      
       $gender=$request->get('gender');
       $province=$request->get('province_id');
       $city=$request->get('city_id');

       if($city == 'todos'){
        $publicist=Publicist::orderBy('id','ASC')
       ->gender($gender)
       ->province($province)
       ->where('profile_status','ACTIVO')
       ->paginate(6);
       }


       else if($province == 'todos'){
        $publicist=Publicist::orderBy('id','ASC')
       ->gender($gender)
       ->city($city)
       ->where('profile_status','ACTIVO')
       ->paginate(6);
       }

       else if($province == 'todos' && $cities == 'todos'){
        $publicist=Publicist::orderBy('id','ASC')
       ->gender($gender)
       ->where('profile_status','ACTIVO')
       ->paginate(6);
       }
       else{
        $publicist=Publicist::orderBy('id','ASC')
       ->gender($gender)
       ->province($province)
       ->city($city)
       ->where('profile_status','ACTIVO')
       ->paginate(6);
       }


       $provinces= DB::table('provinces')->orderBy('provincia',"asc")->get();
       $cities= DB::table('cities')->orderBy('localidad',"asc")->get();
      
       return view('home',compact('publicist','provinces','cities'));

    }
}
