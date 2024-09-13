<?php

namespace App\Http\Controllers;

use App\Models\Live;
use App\Http\Requests\StoreLiveRequest;
use App\Http\Requests\UpdateLiveRequest;

class LiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreLiveRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Live $live)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Live $live)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLiveRequest $request, Live $live)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Live $live)
    {
        //
    }
}
