<?php

namespace App\Http\Controllers;


use App\Models\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TagController extends Controller
{
    public function listAllTags()
    {
        $tags = Tag::all();
        return view('forum.tags.viewTags', ['tags' => $tags]);
    }

    // public function listTagById($id)
    // {
    //     $tag = Tag::findOrFail($id);
    //     return view('tags.listTagById', ['tag' => $tag]);
    // }

    public function listTagByTitle(Request $request,$title) {
        $tag = Tag::where('title', $title)->first();
        return view('forum.tags.editTags', ['tag' => $tag]);
        // return view('categories.find');
    }

    public function createTag(Request $request)
    {
        if ($request->isMethod('GET')) {
            return view('forum.tags.create');
        }
        else{
            $request->validate([
                'title' => 'required|string|max:255',
            ]);
        }

        $tag = Tag::create([
            'title' => $request->title,
        ]);

        Auth::login(Auth::user());

        return redirect()->route('viewTags')->with('success', 'Tag created successfully');
    }

    public function editTag($id)
    {
        $tag = Tag::findOrFail($id);
        return view('tags.editTag', ['tag' => $tag]);
    }

    public function updateTag(Request $request, $id)
    {
        $tag = Tag::where('id', $id)->first();
        $tag->title = $request-> title;
        $tag->save();
        return redirect()->route('viewTags', [$tag->id])
            ->with('message', 'Atualizado com sucesso!');
    }

    public function DeleteTag(Request $request, $id)
    { 
        $tag = Tag::findOrFail($id);
        $tag->delete();

        return redirect()->route('viewTags')->with('success', 'Tag deleted successfully');
    }
}
