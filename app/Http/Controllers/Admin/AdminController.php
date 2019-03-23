<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Publicist;

class AdminController extends Controller
{

	public function __construct(){
		$this->middleware('admin');
	}

    public function admin(){
    	$pu=1;
    	$u=1;
    	$n=1;
    	$publicists=Publicist::orderBy('id','ASC')->get();
    	$users=User::orderBy('id','ASC')->where('role','STANDAR')->get();
    	return view('admin.admin',compact('publicists','pu','u','n','g','users','genders'));
    }
}
