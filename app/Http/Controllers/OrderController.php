<?php

namespace App\Http\Controllers;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Response;

use App\Models\User;
use App\Models\Post;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order()
    {

       // Retrieve all cart items with eager loading of the related posts
    $cart_items = CartItem::with('post')->latest()->get();

        return view('admin.orders.index',  compact('cart_items'));
    }

    public function OrderSearch(Request $request)
    {
        $query = $request->input('query');

        $keywords = explode(' ', strtolower($query));

        $results = CartItem::with(['post', 'user'])
            ->where(function ($queryBuilder) use ($keywords) {
                foreach ($keywords as $keyword) {
                    $queryBuilder->orWhereHas('post', function ($postQuery) use ($keyword) {
                        $postQuery->whereRaw('LOWER(title) LIKE ?', ['%' . $keyword . '%']);
                    })
                    ->orWhereHas('user', function ($userQuery) use ($keyword) {
                        $userQuery->whereRaw('LOWER(name) LIKE ?', ['%' . $keyword . '%']);
                    });
                }
            })
            ->latest()
            ->get();

        if ($results->isEmpty()) {
            // No search results found, display a message
            return view('admin.orders.search', ['status' => 'Uh-Ah! No Order found! Check spelling or character and try again . . .']);
        }

        return view('admin.orders.search', compact('results'));
    }



    public function orderUser()
    {
        $user_id = auth()->user()->id;

        // Retrieve specific cart items for the user and eager load the related posts
        $cart_items = CartItem::with('post')
            ->where('user_id', $user_id)
            ->latest()
            ->get();

        return view('orders.index', compact('cart_items', 'user_id'));
    }

    public function destroy(CartItem $cart_item)
    {
        // Delete the cart item from the database
        $cart_item->delete();

        // Redirect back
        return redirect()->back()->with('status', 'The product has been removed from the Order List.');
     }



    public function place($id)
    {
        return response()->view('confirm-order.index', [
            'post' => Post::findOrFail($id),
        ]);
    }

    public function submitOrder(Request $request, $id)
    {
         // Validate and process the form submission
        $this->validate($request, [
            'user_id' => 'required',
            'post_id' => 'required',
            'total_order' => 'required|integer|min:1',
        ]);

        // Get the post_id from the hidden input
        $post_id = $request->input('post_id');
        $user_id = $request->input('user_id');
        $total_order = $request->input('total_order');
        $price = $request->input('price');

        $totalAmount = $request->input('total_order') * $price;

        // cart item associated with the post_id
        $cartItem = new CartItem([
            'user_id' => $user_id,
            'post_id' => $post_id,
            'total_order' => $total_order,
            'total_amount' => $totalAmount,
        ]);

        // Save the cart item
        $cartItem->save();

        // Redirect back with a success message
        return redirect()->route('home')->with('status', 'Congratulation! Your order has been created successfully');


    }





    public function check()
    {

      // Check if the authenticated user exists in the database if yes, redirect to Dashboard page
    if (auth()->check()) {
        $user = auth()->user();
        return redirect(RouteServiceProvider::HOME);


    } else {
        // User is not authenticated, redirect to register
        return redirect()->route('register');
        }
    }
}
