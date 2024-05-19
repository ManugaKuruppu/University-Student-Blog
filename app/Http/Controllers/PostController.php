<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Events\NewContentCreated;

class PostController extends Controller
{
    public function index()
    {
        // Fetch the latest posts immediately after creating a new one
        $posts = Post::all();

        // Cache the categories
        $categories = Category::all();

        return view('posts.index', [
            'posts' => $posts,
            'categories' => $categories
        ]);
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
        $validated = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'published_at' => 'nullable|date',
            'featured' => 'boolean',
            'user_id' => 'required|exists:users,id',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts/images', 'public');
        } else {
            $imagePath = null;
        }

        $slug = Str::slug($validated['title']);
        $uniqueSlug = $this->makeUniqueSlug($slug);

        $post = new Post();
        $post->title = $validated['title'];
        $post->body = $validated['body'];
        $post->image = $imagePath;
        $post->published_at = $validated['published_at'];
        $post->featured = $validated['featured'] ?? false;
        $post->user_id = $validated['user_id'];
        $post->slug = $uniqueSlug;
        $post->save();

        // Attach categories
        $post->categories()->sync($validated['categories']);

        event(new NewContentCreated($post->body));

        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    private function makeUniqueSlug($slug)
    {
        $newSlug = $slug;
        $count = 1;

        while (Post::where('slug', $newSlug)->exists()) {
            $newSlug = $slug . '-' . $count;
            $count++;
        }

        return $newSlug;
    }

    public function make()
    {
        $users = User::all();
        $categories = Category::all();

        return view('posts.create', compact('users', 'categories'));
    }

//    public function notifi(Request $request) {
//
//        // Any additional logic
//    }
}
