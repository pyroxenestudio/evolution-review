<?php

namespace App\Http\Controllers;

use App\Http\Requests\Storegame_versionRequest;
use App\Http\Requests\Updategame_versionRequest;
use App\Models\game_version;

class GameVersionController extends Controller
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
    public function store(Storegame_versionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(game_version $game_version)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(game_version $game_version)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updategame_versionRequest $request, game_version $game_version)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(game_version $game_version)
    {
        //
    }
}
