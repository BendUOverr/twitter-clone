<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    //
    public function show($id){
        $idea = Idea::findOrFail($id);
        return view('ideas.show', compact('idea'));
    }
    public function store()
    {
        request()->validate([
            'content' => 'required|min:1|max:240'
        ]);

        $idea = Idea::create([
            'content' => request()->get('content', ''),
        ]);
        return redirect()->route('ideas.index')->with('success', 'Idea posted successfully !');
    }

    public function destroy($id){
        $idea = Idea::where('id',$id)->firstOrFail();
        $idea->delete();
        return redirect()->route('dashboard')->with('success', 'Idea deleted successfully !');
    }
    public function edit($id)
{
    $editing = true;
    $idea = Idea::findOrFail($id);
    return view('ideas.show', compact('idea','editing'));
}
public function update(Request $request, $id)
{
    $idea = Idea::findOrFail($id);
    $request->validate([
            'content' => 'required|min:1|max:240',
        ]);

        $idea -> update([
        'content' => $request->content,

        ]);

        return redirect()->route('ideas.index')->with('success', 'Idea updated successfully!');
}

}
