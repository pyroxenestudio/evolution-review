<?php

namespace App\Http\Controllers;

use App\Http\Requests\Storegame_version_platformRequest;
use App\Http\Requests\Updategame_version_platformRequest;
use App\Models\game_version_platform;

class GameVersionPlatformController extends Controller
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
    public function store(Storegame_version_platformRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(game_version_platform $game_version_platform)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(game_version_platform $game_version_platform)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updategame_version_platformRequest $request, game_version_platform $game_version_platform)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(game_version_platform $game_version_platform)
    {
        //
    }
}
