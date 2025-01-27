<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver\RequestPayloadValueResolver;

class AuthController extends Controller
{
    //
    public function register(){
    return view('auth.register');
    }

    public function store(){
        $validated = request()->validate(
            [
                'name' => 'required|min:3|max:40',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|confirmed'
            ]
            );

            User::create(
                [
                    'name' => $validated['name'],
                    'email' => $validated['email'],
                    'password' => Hash::make($validated['password']),
                ]
                );

                return redirect()->route('ideas.index')->with('success', 'You registered successfully !');
            }

            public function login(){
                return view('auth.login');
                }

                public function authenticate(){
                    $validated = request()->validate(
                        [
                            'email' => 'required|email',
                            'password' => 'required'
                        ]
                        );

                        if(auth()->attempt($validated)){
                            request()->session()->regenerate();

                            return redirect()->route('ideas.index')->with('success','Logged in successfully !');
                        }



                            return redirect()->route('login')->withErrors(
                                [
                                    'email' => 'Email or password is incorrect'
                                ]
                            );


                        }
                        public function logout(){
                            auth()->logout();
                            request()->session()->invalidate();
                            request()->session()->regenerateToken();

                            return redirect()->route('login')->with('success','Logged out successfully !');
                        }
}
