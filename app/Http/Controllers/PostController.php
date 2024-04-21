<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    public function index()
    {

        $categories = Cache::remember('categories', now(), function () {
            return Category::whereHas('posts', function ($query) {
                $query->published();
            })->take(10)->get();
        });

        return view(
            'posts.index',
            [
                'categories' => $categories
            ]
        );
    }

    public function show(Post $post)
    {
        return view(
            'posts.show',
            [
                'post' => $post
            ]
        );
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:150',
            'slug' => 'required|string|unique:posts,slug|max:150',
            'body' => 'required|string',
            'image' => 'image', // Assuming 'image' is a valid field for file upload
            'published_at' => 'nullable|date',
            'featured' => 'boolean',
            'user_id' => 'required|exists:users,id',
            'categories' => 'array', // Assuming 'categories' is an array of category IDs
        ]);

        // Handle file upload if an image was provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts/thumbnails', 'public');
            $validatedData['image'] = $imagePath;
        }

        // Create the post
        $post = new Post();
        $post->title = $validatedData['title'];
        $post->slug = $validatedData['slug'];
        $post->body = $validatedData['body'];
        $post->image = $validatedData['image'] ?? null; // Null coalesce operator to handle if 'image' is not set
        $post->published_at = $validatedData['published_at'];
        $post->featured = $validatedData['featured'];
        $post->user_id = $validatedData['user_id'];
        $post->save();

        // Attach categories
        $post->categories()->attach($validatedData['categories']);

        return response()->json(['message' => 'Post created successfully', 'post' => $post], 201);
    }
}
