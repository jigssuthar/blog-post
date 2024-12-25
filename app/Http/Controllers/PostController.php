<?php
// app/Http/Controllers/PostController.php
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\PostImage;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Notifications\PostCreatedNotification;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::query();
        if ($request->has('search') && $request->search != '') {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                ->orWhere('content', 'like', '%' . $search . '%');
            });
        }
        if ($request->has('start_date') && $request->start_date != '') {
            $query->where('created_at', '>=', $request->start_date);
        }
        if ($request->has('end_date') && $request->end_date != '') {
            $query->where('created_at', '<=', $request->end_date);
        }
        $posts = $query->with('user','images')->latest()->paginate(10);
        $users = User::all();
        return view('posts.index', compact('posts', 'users'));
    }

    

    
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif'
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = Auth::id();
        $post->save();
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('post_images', 'public');
            $post->image_path = $imagePath;
        }
    
        $post->save();
        return redirect()->route('posts.index');
    }

    public function edit(Post $post)
    {
       if (auth()->id() !== $post->user_id && !auth()->user()->hasRole('admin')) {
        return redirect()->route('posts.index')->with('error', 'Unauthorized action');
    }
    
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
       
        if (auth()->id() !== $post->user_id && !auth()->user()->hasRole('admin')) {
            return redirect()->route('posts.index')->with('error', 'Unauthorized action');
        }
    
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $post->title = $request->title;
        $post->content = $request->content;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('post_images', 'public');
            $post->image_path = $imagePath;
        }

        $post->save();

        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        if (auth()->id() !== $post->user_id && !auth()->user()->hasRole('admin')) {
            return redirect()->route('posts.index')->with('error', 'Unauthorized action');
        }
    
        $post->delete();
        return redirect()->route('posts.index');
    }
}

