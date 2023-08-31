<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRollRequest;
use App\Http\Requests\UpdateRollRequest;
use App\Models\Roll;

class RollController extends Controller
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
    public function store(StoreRollRequest $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(Roll $roll)
    {
        return view('roll.show', [
            'roll' => $roll
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Roll $roll)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRollRequest $request, Roll $roll)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Roll $roll)
    {
        //
    }
}
