<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostControllerApi extends Controller
{
    // Get all posts
    public function index()
    {
        return response()->json(Post::all());
    }

    // Get a single post
    public function show($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        return response()->json($post);
    }

    // Create a new post
    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string',
        'content' => 'required|string',
        'image' => 'required|image|max:1024',
    ]);

    $imagePath = $request->file('image')->store('post_images', 'public');
    
    $post = Post::create([
        'title' => $request->title,
        'content' => $request->content,
        'user_id' => auth()->id(),
    ]);

    $post->images()->create([
        'image_path' => $imagePath
    ]);

    return response()->json($post, 201);
}


    // Update an existing post
    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
        ]);

        $post->update($request->all());

        return response()->json($post);
    }

    // Delete a post
    public function destroy($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        $post->delete();

        return response()->json(['message' => 'Post deleted successfully']);
    }
}
