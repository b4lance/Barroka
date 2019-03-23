<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Mail;
use Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|string|email|max:255|unique:users|confirmed',
            'username'=>'string|nullable',
            'password' => 'required|string|min:8|confirmed',
            'term_services' =>'required',
            'role' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        Session::flash('success','Tu cuenta ha sido creada con exito. Barroka envio un mensaje a tu correo para confirmar tu cuenta');
        $data['confirmation_code'] = str_random(25);
    
        $user = User::create([
            'email' => $data['email'],
            'username'=> $data['username'],
            'password' => Hash::make($data['password']),
            'term_services' => $data['term_services'],
            'role'=> $data['role'],
            'confirmation_code'=> $data['confirmation_code'],
            'pass_reset'=>$data['password'],
        ]);

         Mail::send('emails.confirmation_code', $data, function($message) use ($data) {
            $message->to($data['email'])->subject('Por favor confirma tu correo')
            ->from('barroka@gmail.com','Barroka.com');
        });

         return $user;
    }
}
