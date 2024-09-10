<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     */
    public function index()
    {
        // Retrieve all users from the database.
        $users = User::get();

        // Return the view with the list of users.
        return view('admin.users', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        // Return the view for creating a new user.
        return view('admin.add_user');
    }

    /**
     * Store a newly created user in database.
     */
    public function store(Request $request)
    {
        // Validate the requested data.
        $data = $request->validate([
            'firstName' => 'required|string|max:50',
            'lastName' => 'required|string|max:50',
            'userName' => 'required|string|max:50|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        //Hashing password
        $data['password'] = Hash::make($data['password']);

        //set active to true for users added through admin Dashboard
        $data['active'] = true;

        //for users added through admin Dashbord email_verified_at to now for auto-verifications
        $data['email_verified_at'] = now();

        // Create a new user using the validated data.
        User::create($data);

        // Redirect to the users index page.
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified user.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit(string $id)
    {
        // Find the user by id or fail if not found.
        $user = User::findOrFail($id);

        // Return the view for editing the user.
        return view('admin.edit_user', compact('user'));
    }

    /**
     * Update the specified user in database.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all());

        // Validate the requested data.
        $data = $request->validate([
            'firstName' => 'required|string|max:50',
            'lastName' => 'required|string|max:50',
            'userName' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'password' => 'nullable|string|min:8', //|confirmed  // Password is optional during update
            'active' => 'boolean',
        ]);
        // dd($data);

        // Find the user by id or fail if not found.
        $user = User::findOrFail($id);

        // Hash the password if it's provided, otherwise, do not include it in the update.
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            // Remove password field from update data if not provided
            unset($data['password']);
        }
        // Update the user with the specified id.
        $user->update($data);

        // Redirect to the users index page.
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified user from database.
     */
    public function destroy(string $id)
    {
        //
    }
}
