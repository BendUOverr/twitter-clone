<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    //
    public function follow($id){
        $user = User::findOrFail($id);
        $follower = auth()->user();
        $follower->followings()->attach($user);

        return redirect()->route('users.show', $user->id)->with('success', 'Followed successfully !');
     }


     public function unfollow($id){
      $user = User::findOrFail($id);
      $follower = auth()->user();
      $follower->followings()->detach($user);

      return redirect()->route('users.show', $user->id)->with('success', 'UnFollowed successfully !');
     }
}
