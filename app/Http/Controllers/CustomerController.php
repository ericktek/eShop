<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function customer()
    {
        $users = User::all();

        // Return the 'users.index' Blade view with the users data
        return view('admin.customers.index', compact('users'));
    }
    public function search(Request $request)
    {
        $query = $request->input('query');

        $users = User::where('name', 'like', '%' . $query . '%')
                    ->orWhere('email', 'like', '%' . $query . '%')
                    ->orWhere('phone_number', 'like', '%' . $query . '%')
                    ->get();

        if ($users->isEmpty()) {
            return view('admin.customers.search', ['status' => 'Uh-Ah! No results found! Check spelling or character and try again..', 'users' => $users]);
        }

        return view('admin.customers.search', compact('users'));
    }
}
