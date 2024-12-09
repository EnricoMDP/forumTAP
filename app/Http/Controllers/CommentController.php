<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Topic;

class CommentController extends Controller
{
    public function createComment(Request $request)
    {
        $validatedData = $request->validate([
            'content' => 'required|string',
            'post_id' => 'nullable|integer|exists:posts,id',
            'commentable_id' => 'nullable|integer|exists:comments,id',
            'topic_id' => 'required|exists:topics,id',
        ]);
        
        
        $comment = new Comment();
        $comment->content = $validatedData['content'];
        $comment->user_id = auth()->id();
        $comment->topic_id = $validatedData['topic_id'];

        if (!empty($validatedData['commentable_id'])) {
            $comment->commentable_id = $validatedData['commentable_id'];
            $comment->commentable_type = Comment::class;
        } else {
            $comment->commentable_id = $validatedData['post_id'];
            $comment->commentable_type = Post::class;
        }

        $comment->save();
    
        return redirect()->back()->with('success', 'Comentário adicionado com sucesso.');
    }

    public function editComment($id)
    {
        $comment = Comment::findOrFail($id);
        $topic = Topic::find($comment->topic_id);
        return view('forum.topics.editComment', ['topic' => $topic, 'comment' => $comment]);
    }
    
    
    public function updateComment(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string',
            'image' => 'nullable|image',
        ]);

        $comment = Comment::findOrFail($id);
        $comment->content = $request->content;
        $comment->save();

        $post = $comment->post;
        if ($post) {
            $post->update([
                'image' => $request->file('image') ? $request->file('image')->store('images', 'public') : $post->image,
                'user_id' => auth()->id(),
            ]);
        }

        $topicId = $comment->topic_id;

        return redirect()->route('ListTopicById', $topicId)->with('success', 'Comentário atualizado com sucesso.');
    }

    public function deleteComment($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return redirect()->back();
    }
}
