<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function edit()
    {
        if (Auth::user()) {
            $user = User::find(Auth::user()->id);

            if ($user) {
                return view('user.edit')->withUser($user);
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if ($user) {
            $validate = null;
            if (Auth::user()->email === $request['email']) {
                $validate = $request->validate([
                    'name' => 'required|min:2',
                    'email' => 'required|email',

                ]);
            } else {
                $validate = $request->validate([
                    'name' => 'required|min:2',
                    'email' => 'required|email|unique:users',


                ]);
            }

            if ($validate) {
                $user->name = $request['name'];
                $user->email = $request['email'];


                $user->save();

                $request->session()->flash('success', 'Votre Profil a été mis a jour');
                return redirect()->back();
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    public function passwordEdit()
    {
        if (Auth::user()) {
            return view('user.password');
        } else {
            return redirect()->back();
        }
    }

    public function passwordUpdate(Request $request)
    {
        $validate = $request->validate([
            'oldPassword' => 'required|min:7',
            'password' => 'required|min:7|required_with:password_confirmation'
            
        ]);
        $user = User::find(Auth::user()->id);

        if ($user) {
            if (Hash::check($request['oldPassword'], $user->password) && $validate) {
                $user->password = Hash::make($request['password']);

                $user->save();
                $request->session()->flash('success', 'Le Mot de Passe à bien été changer!');
                return redirect()->back();
            } else {
                $request->session()->flash('error', 'Le Mot de Passe entrer n\'est pas le meme que le mot de passe actuel');
                return redirect()->route('password.edit');
            }
        }
    }


    public function profile($id){   
        $user = User::find($id);

        if($user){
            return view('user.profile')->withUser($user);
        }
        else{
            return redirect()->back();
        }
    }
}