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

    public function listTagById($id)
    {
        $tag = Tag::findOrFail($id);
        return view('tags.listTagById', ['tag' => $tag]);
    }

    public function createTag(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $tag = Tag::create([
            'title' => $request->title,

        ]);

        return redirect()->route('listAllTags')->with('success', 'Tag created successfully');
    }

    public function editTag($id)
    {
        $tag = Tag::findOrFail($id);
        return view('tags.editTag', ['tag' => $tag]);
    }

    public function updateTag(Request $request, $id)
    {
        $request->validate([
            'id' => 'required|int|max:255',
            'title' => 'required|string|max:255',
            
        ]);

        $tag = Tag::findOrFail($id);
        $tag->title = $request->title;

        $tag->save();

        return redirect()->route('listAllTags')->with('success', 'Tag updated successfully');
    }

    public function deleteTag($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();

        return redirect()->route('listAllTags')->with('success', 'Tag deleted successfully');
    }
}
