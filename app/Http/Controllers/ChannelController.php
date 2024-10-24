<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Http\Requests\StoreChannelRequest;
use App\Http\Requests\UpdateChannelRequest;

class ChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia('Channels/Index', [
            'channels' => Channel::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Channels/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChannelRequest $request)
    {
        $channel = $request->user()->channels()->make($request->validated());
        // Generate this channel's livestream key
        // 'livestream_key' is not mass-assignable for security reasons
        $channel->livestream_key = Channel::generateLivestreamKey();
        $channel->save();

        return to_route('channels.show', $channel);
    }

    /**
     * Display the specified resource.
     */
    public function show(Channel $channel)
    {
        // We hide the livestream key from the user by default
        $hidden_livestream_key = null;
        if ($channel->livestream_key != null) {
            $hidden_livestream_key = str_repeat('*', strlen($channel->livestream_key));
        }

        return inertia('Channels/Show', [
            'channel' => array_merge($channel->load('rolls')->loadCount('rolls'),
                ['livestream_key' => $hidden_livestream_key]
            )
        ]);
    }

    /**
     * Return the livestream key for the specified channel.
     *
     * If the user wants to see their livestream key.
     */
    public function showLivestreamKey(Channel $channel)
    {
        return response()->json(['livestream_key' => $channel->livestream_key]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Channel $channel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChannelRequest $request, Channel $channel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Channel $channel)
    {
        //
    }
}
