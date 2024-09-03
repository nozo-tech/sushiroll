<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use App\Http\Requests\StoreThreadRequest;
use App\Http\Requests\UpdateThreadRequest;

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

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
    public function store(StoreThreadRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Thread $thread)
    {
        return inertia('Threads/Show', ['thread' => [
            'id' => $thread->id,
            'title' => $thread->title,
            'text' => $thread->text,
            'user' => $thread->user,
            'is_locked' => $thread->is_locked,
            'is_private' => $thread->is_private,
            'community' => $thread->community,
            'created_at' => $thread->created_at,
            'updated_at' => $thread->updated_at,
        ]]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Thread $thread)
    {
        //
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
