<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class NoteController extends Controller
{

    public function __construct(){
        $this->middleware('admin');
    }

    public function nuevanota(){
    	$users=User::where('role','PUBLICIST')->get();
    	return view('admin.notes.nuevanota',compact('users'));
    }

    public function noteStore(Request $request){
        $id=$request->user_id;
    	$user=User::findOrFail($id);
    	$user->notes = $request->note;
    	$user->save();

    	return redirect()->route('admin')->with('success','Nota ingresada con exito');
    }		

    public function EditarNota($id){
        $user=User::findOrFail($id);
        $users=User::where('role','PUBLICIST')->get();
        return view('admin.notes.editarnota',compact('user','users'));
    }

    public function noteUpdate(Request $request,$id){
        $user=User::findOrFail($id);
        $user->notes = $request->note;
        $user->save();
        return redirect()->route('admin')->with('success','Nota modificada con exito');
    }

}
