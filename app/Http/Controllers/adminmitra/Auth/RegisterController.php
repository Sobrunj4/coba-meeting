<?php

namespace App\Http\Controllers\adminmitra\Auth;

use App\Events\AdminMitra\Auth\AdminMitraActivationEmail;
use App\Http\Controllers\Controller;
use App\Mitra;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


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

    //use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:adminmitra');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    public  function showRegisterForm()
    {
        return view('auth_adminmitra.register');
    }

    public  function  store(Request $request)
    {

//        $this->validate($request, [
//            'nama_mitra'    => 'required|unique:mitras',
//            'email'         => 'required|unique:mitras|email',
//            'no_hp'         => 'required|unique:mitras',
//            "password"      => 'required',
//            'nama_pemilik'  => 'required',
//            'nama_bank'     => 'required',
//            'nama_rekening' => 'required',
//            'nama_akun_bank'=> 'required',
//            'alamat'        =>'required',
//
//        ]);


        $data = new Mitra();
        $data->nama_mitra       = $request->nama_mitra;
        $data->email            =$request->email;
        $data->no_hp            =$request->no_hp;
        $data->password         =Hash::make($request->password);
        $data->nama_pemilik     =$request->nama_pemeilik;
        $data->nama_bank        =$request->nama_bank;
        $data->nama_rekening    =$request->nama_rekening;
        $data->nama_akun_bank   =$request->nama_akun_bank;
        $data->alamat           =$request->alamat;
        $data->activation_token = Str::random( 100);
        //dd($data);
        $data->save();

        event(new AdminMitraActivationEmail($data));
        return redirect()->route('adminmitra.login');


    }

}
