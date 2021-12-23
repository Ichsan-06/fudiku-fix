<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Spatie\Permission\Traits\HasRoles;

class LoginAdminController extends Controller
{
    use HasRoles;
   
    public function index(){
       return view('auth.loginAdmin');
   }

   public function post(Request $request)
    {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            
            $user = auth()->user();

            if ($user->hasRole('admin')) {
                return redirect()->route('dashboard');
            }
    
            return redirect()->back()->with('status', 'Username Ataus Password Salah');
        }
        else{
            return redirect()->back()->with('status', 'Username Atau Password Salah');
        }

    }
}
