<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return view('login');
    }
    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt($request->only('email', 'password'))) {
            if (auth()->user()->relasi_role->role == 'superadmin') {
                return response()->json([
                    'status' => 1,
                    'msg' => 'Berhasil login sebagai Super Admin !',
                    'route' => route('superadmin.Dashboard')
                ]);
                // return redirect()->route('admin.Dashboard');
            } elseif (auth()->user()->relasi_role->role == 'admin') {
                return response()->json([
                    'status' => 1,
                    'msg' => 'Berhasil login sebagai Admin !',
                    'route' => route('admin.Dashboard')
                ]);
                // return redirect()->route('asesi.Dashboard');
            } elseif (auth()->user()->relasi_role->role == 'marketing') {
                return response()->json([
                    'status' => 1,
                    'msg' => 'Berhasil login sebagai Marketing !',
                    'route' => route('marketing.Dashboard')
                ]);
                // return redirect()->route('asesor.Dashboard');
            } elseif (auth()->user()->relasi_role->role == 'produksi') {
                return response()->json([
                    'status' => 1,
                    'msg' => 'Berhasil login sebagai Peninjau !',
                    'route' => route('produksi.Dashboard')
                ]);
                // return "Peninjau";
                // return redirect()->route('dealer.Dashboard');
            }
        } else {
            return response()->json([
                'status' => 0,
                'msg' => 'Login gagal, Username / password salah !',
            ]);
        }
    }
    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('Login');
    }
}
