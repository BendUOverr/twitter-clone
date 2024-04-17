<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($id)
    {
        //
        $user=User::findOrFail($id);
        $ideas=$user->ideas;
        return view('users.show' , compact('user', 'ideas'));
    }


    public function edit($id)
    {
        //
        $editing = true;
        $user=User::findOrFail($id);
        return view('users.edit' , compact('user', 'editing'));
    }


    public function update(User $user)
    {
        //
        $validated = request()->validate([
           'name' => 'required|min:3|max:40',
           'bio'  => 'nullable|min:1|max:255',
           'image' => 'image'
        ]);

        if(request()->has('image')){
            $imagePath = request()->file('image')->store('profile', 'public');
            $validated['image'] = $imagePath;
        }

        $user->update($validated);
        return redirect()->route('profile');
    }

    public function profile(){
        $userId = auth()->id(); // Get the ID of the authenticated user
        return $this->show($userId); // Call the show method with the user ID
    }

}
