<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Display a listing of the resource based on a search query.
     */
    public function search()
    {
        $users = User::where('handle', 'like', request('query'))->paginate(50)->get();

        return inertia('Users/Index', [
            'users' => $users
        ]);
    }

    /**
     * Try to authenticate the user.
     */
    public function login(Request $request)
    {
        if (auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $request->input('remember'))) {
            return to_route('home');
        }

        return back()->withErrors(['login' => 'The provided credentials do not match our records.']);
    }

    /**
     * Log the user out.
     */
    public function logout()
    {
        auth()->logout();

        return back()->with('success', 'You have been logged out successfully.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return to_route('register'); // Redundancy.
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        User::create($request->validated());

        return to_route('login');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return inertia('Users/Show', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return inertia('Users/Edit', [
            'user' => $user->only('handle', 'name', 'description', 'email')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        if ($user->email !== $request->validated()['email']) {
            // If the user changes their email, we need to re-verify it
            $user->email_verified_at = null;
        }

        if (! empty($request->validated()['password'])) {
            if (Hash::check($request->validated()['old_password'], $user->password)) {
                return back()->withErrors(['password' => 'The provided previous password does not match our records.']);
            }
        }

        $user->update($request->safe()->except('old_password'));

        return to_route('users.show', $user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return to_route('welcome');
    }
}
