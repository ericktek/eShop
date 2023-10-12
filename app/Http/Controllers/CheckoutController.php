<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
// Use the Post Model
use App\Models\Post;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $posts = Post::latest()->get(); // Fetch all posts
        return view('welcome', compact('posts'));

    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $keywords = explode(' ', strtolower($query));

        $results = Post::where(function ($queryBuilder) use ($keywords) {
            foreach ($keywords as $keyword) {
                $queryBuilder->orWhereRaw('LOWER(title) LIKE ?', ['%' . $keyword . '%']);
            }
        })->latest()->get();

        if ($results->isEmpty()) {
            // No search results found, display a message
            return view('search', ['status' => 'Uh-Ah! No product found with that Name Please! Check spelling or character and try again . . .']);
        }

        return view('search', compact('results'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);

        // Retrieve the selected item ID from the session
        $selectedItemId = session('selectedItemId');

        return view('checkout.index', compact('post', 'selectedItemId'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return response()->view('orders.index', [
            'post' => Post::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
