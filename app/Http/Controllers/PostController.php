<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
// Use the Post Model
use App\Models\Post;
// We will use Form Request to validate incoming requests from our store and update method
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(): Response
    {

        return response()->view('admin.posts.index', [
            'posts' => Post::orderBy('updated_at', 'desc')->get(),
        ], 200);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('admin.posts.form');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('featured_image')) {
             // put image in the public storage
            $filePath = Storage::disk('public')->put('images/posts/featured-images', request()->file('featured_image'));
            $validated['featured_image'] = $filePath;
        }

        // insert only requests that already validated in the StoreRequest
        $create = Post::create($validated);

        if($create) {
            // add flash for the success notification
            session()->flash('status', 'Post created successfully!');
            return redirect()->route('posts.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        return response()->view('admin.posts.show', [
            'post' => Post::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        return response()->view('admin.posts.form', [
            'post' => Post::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $post = Post::findOrFail($id);
        $validated = $request->validated();

        if ($request->hasFile('featured_image')) {
            // delete image
            Storage::disk('public')->delete($post->featured_image);

            $filePath = Storage::disk('public')->put('images/posts/featured-images', request()->file('featured_image'), 'public');
            $validated['featured_image'] = $filePath;
        }

        $update = $post->update($validated);

        if($update) {
            session()->flash('status', 'Post updated successfully!');
            return redirect()->route('posts.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $post = Post::findOrFail($id);

        Storage::disk('public')->delete($post->featured_image);

        $delete = $post->delete($id);

        if($delete) {
            session()->flash('status', 'Post deleted successfully!');
            return redirect()->back();
        }

        return abort(500);
    }

    public function search(Request $request)
        {
            $query = $request->input('query');

            $results = Post::where('title', 'like', '%' . $query . '%')
                        ->orWhere('content', 'like', '%' . $query . '%')
                        ->get();

            if ($results->isEmpty()) {
                // No search results found, display a message
                return view('admin.posts.search', ['status' => 'Uh-Ah! No results found! Check spelling or character and try again..']);
            }

            return view('admin.posts.search', compact('results'));
        }
}
