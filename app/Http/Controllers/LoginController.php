<?php

namespace App\Http\Controllers;

use App\Models\NasabahSampah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Carbon\Carbon;
use DB;

class LoginController extends Controller
{
    // public function actionlogin (Request $request){


    //     if (Auth::attempt($request->only('email', 'password'))) {

    //         $user = Auth::user();
    //         session(['role' => $user->role]);
    //         return redirect('home');
    //     }
    //     // dd($request->all());
    //     return redirect()->route('login')->with('error', 'Email atau password salah.');
    // }
    public function actionlogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            session(['role' => $user->role]);
    
            if ($user->role === 'admin') {
                return redirect('adminhome');
            } elseif ($user->role === 'user') {
                return redirect('nasahome');
            }
        }
    
        return redirect()->route('login')->with('error', 'Email atau password salah.');
    }

    // public function landingPage(){
    //     return view('layout.landing');
    // }
    //     public function actionlogin(Request $request)
// {
//     $credentials = $request->only('email', 'password');

    //     if (Auth::attempt($credentials)) {
//         $user = Auth::user();
//         session(['role' => $user->role]);
//         return redirect('dashboard');
//     }

    //     // Jika proses autentikasi gagal, kembalikan pengguna ke halaman login
//     return redirect()->route('login')->with('error', 'Email atau password salah.');
// }

    //     $data = [
    //         'email' => $request->input('email'),
    //         'password' => $request->input('password'),
    //     ];

    //     $tanggalJamSekarang = now();


    //     if (Auth::attempt($data)) {

    //         if (Auth::check()) {
    //             switch (auth()->user()->role) {
    //                 case 'admin':
    //                     return view('admin.home');
    //                 case 'user':
    //                     return view('user.home');
    //                 default:
    //                     return view('login');
    //             }
    //         }else{
    //             return view('login');
    //         }
    //     } else {
    //         return redirect()->route('login')->with('error', 'Hayoo bobol ya');
    //     }
    //}

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
    /*
        public function login()
        {
            if (Auth::check()) {
                switch (auth()->user()->role) {
                    case 'admin':
                        return view('admin.dashboard');
                    case 'user':
                        return view('user.dashboard');
                    default:
                        return view('login');
                }
            }else{
                return view('login');
            }
        }
        


        public function actionlogin(Request $request,$user)
        {
            $data = [
                'email' => $request->input('email'),
                'password' => $request->input('password'),
            ];
        
            //dd($data);
            $tanggalJamSekarang = Carbon::now()->toDateTimeString();
        
            if ($user->role === 'admin') {
                return redirect()->route('homeAdmin');
            } elseif ($user->role === 'user') {
                return redirect()->route('homeNasabah');
            } else {
                return redirect()->route('home');
            }
            // if (Auth::attempt($data)) {
            //     switch (auth()->user()->role) {
            //         case 'admin':
            //             return view('admin.dashboard');
            //         case 'user':
            //             return view('user.dashboard');
            //         default:
            //             return view('login');
            //     }
            // } else {
            //     // Jika gagal login, kembalikan ke halaman login
            //     return view('login');
            // //    return view('dashboard', compact('tanggalJamSekarang'));
            // // }else{
            // //     Session::flash('error', 'Email atau Password Salah');
            // //     return redirect('/');
            // }
        }
*/
    public function actionlogout()
    {
        Auth::logout();
        return redirect('/');
    }

}
