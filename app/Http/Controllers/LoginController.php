<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session as FacadesSession;
use Session;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('/index');
        }else{
            return view('login');
        }
    }

    public function actionlogin(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::Attempt($data)) {
             // Atur waktu kadaluarsa sesi menjadi 2 jam (7200 detik)
            $request->session()->put('login_time', time() + (2 * 60 * 60));
            return redirect('customer');
        }else{
            FacadesSession::flash('error', 'Email atau Password Salah');
            return redirect('login');
        }
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/');
    }
}