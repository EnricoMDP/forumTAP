<?php
    namespace App\Http\Controllers;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Hash;
    use App\Models\Topic;
    use App\Models\Post;
    use App\Models\Tag;
    use App\Models\Category;

    class TopicController extends Controller
    {
        public function listAllTopics(){
            $topics = Topic::all();
            $categories = Category::all();
            $tags = Tag::all();
            return view('forum.topics.listAllTopics', compact('topics', 'categories', 'tags'));
        }

        public function listTopicById($id){
            $topic = Topic::findOrFail($id);
            return view('forum.topics.listTopicById', compact('topic'));
        }

        public function showTopics(){
            $topics = Topic::with(['post', 'comments', 'category'])
                ->withCount(['comments as comments_count', 'post as views_count']) // Conta os comentários e visualizações (ou outro campo de visualização se houver)
                ->get();

            $categories = Category::all();
            return view('welcome', compact('topics', 'categories'));
        }

        public function createTopic(Request $request)
        {
            if($request -> method() === 'GET'){
                $categories = Category::all();
                $tags = Tag::all();
                return view('forum.topics.createTopic', ['categories' => $categories, 'tags' => $tags]);
            } else {
                $request->validate([
                    'title' => 'required|string|max:255',
                    'description' => 'required|string',
                    'image' => 'nullable|url',
                    'status' => 'nullable|string',
                    'tags' => 'array|nullable', 
                    'tags.*' => 'exists:tags,id'  
                ]);

                $topic = Topic::create([
                    'title' => $request->title,
                    'description' => $request->description,
                    'image' => $request->image,
                    'status' => $request->status,
                    'category_id' => $request->category, 
                ]);
            }

            if ($request->filled('tags')) {
                $topic->tags()->sync($request->tags);
            }

            Auth::login(Auth::user());

            return redirect()->route('listAllTopics');
        
        }

        public function editTopic($id)
        {
            $topic = Topic::findOrFail($id);
            $categories = Category::all();
            $tags = Tag::all();
            return view('forum.topics.editTopic', ['topic' => $topic, 'categories' => $categories, 'tags' => $tags]);
        }

        public function store(Request $request){
            $userId = Auth::id();

            $request->validate([
                'title' => 'required|string',
                'description' => 'required|string',
                'image' => 'required|string',
                'status' => 'required|int',
                'category' => 'required'
            ]);

            $topic = Topic::create([
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status,
                'category_id' => $request->category
            ]);

            return($topic);

        }

        public function updateTopic(Request $request, $id)
        {

            $request->validate([
                'title' => 'required|max:255',
                'description' => 'required',
                'category_id' => 'required|exists:categories,id',
                'status' => 'required|boolean',
                'tags' => 'array|nullable', 
                'tags.*' => 'exists:tags,id'  
            ]);

            $topic = Topic::findOrFail($id);
            $topic->title = $request->title;
            $topic->description = $request->description;
            $topic->category_id = $request->category_id;
            $topic->status = $request->status;
            
            $topic->save();

            if ($request->filled('tags')) {
                $topic->tags()->sync($request->tags);
            } else {
                $topic->tags()->detach();
            }

            return redirect()->route('listAllTopics')->with('success', 'Topic updated successfully');
        }

        public function deleteTopic($id){
            $topic = Topic::findOrFail($id);
            $topic->tags()->detach();
            $topic->delete();

            return redirect()->route('listAllTopics')->with('success', 'Topic deleted successfully');

            
        }
    }