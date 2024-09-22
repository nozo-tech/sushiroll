<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use App\Http\Requests\StoreThreadRequest;
use App\Http\Requests\UpdateThreadRequest;
use App\Models\Community;
use App\Models\User;

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource for a user.
     */
    public function user_index(User $user)
    {
        return inertia('Threads/Index', [
            'threads' => $user->threads
        ]);
    }

    /**
     * Display a listing of the resource for a community.
     */
    public function community_index(Community $community)
    {
        return inertia('Threads/Index', [
            'threads' => $community->threads
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Threads/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreThreadRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Thread $thread)
    {
        return inertia('Threads/Show', [
            'thread' => $thread->load('comments')->loadCount('comments')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Thread $thread)
    {
        return inertia('Threads/Edit', [
            'thread' => $thread
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateThreadRequest $request, Thread $thread)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Thread $thread)
    {
        //
    }
}
