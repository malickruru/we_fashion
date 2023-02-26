<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function showLogin(){
       
        return view('auth.login');
        
    }

    // cette méthode autentifie un utilisateur
    public function login(Request $request){
        
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // si l'utilisateur est un admin le rediriger vers l'interface admin
            if (User::find(Auth::user()->id)->isAdmin) {
                $products = Product::paginate(20);
                return view('admin.product_list',compact('products'));
            }
            
            return view('welcome');
        }

        return redirect()->back()->with('error', 'Adresse email ou mot de passe incorrect.')->withInput();
    }
// fonctionde déconnection
    public function logout()
    {
        Auth::logout();

        return redirect()->back()->with('error', 'Vous êtes déconnecté !');
    }
}
