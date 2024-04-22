<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;
use League\CommonMark\Util\LinkParserHelper;

class IdeaLikeController extends Controller
{
    //
   public function like($id){
      $idea = Idea::findOrFail($id);
      $liker = auth()->user();
      $liker->likes()->attach($idea);

      return redirect()->route('ideas.index')->with('success', 'Liked successfully !');
   }


   public function unlike($id){
    $idea = Idea::findOrFail($id);
    $liker = auth()->user();
    $liker->likes()->detach($idea);

    return redirect()->route('ideas.index')->with('success', 'Unliked successfully !');
   }
}
