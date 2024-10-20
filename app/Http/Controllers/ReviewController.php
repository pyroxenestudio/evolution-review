<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorereviewRequest;
use App\Http\Requests\UpdatereviewRequest;
use Illuminate\Http\Request;
use App\Models\GameVersion;
use App\Models\review;
use Inertia\Inertia;
use Inertia\Response;

class ReviewController extends Controller
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
    public function store(StorereviewRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * OLD
     */
    // public function show(Request $request, Review $review): Response
    // {
    //   $gameVersions = Review::getGameVersionsByPlatformWithReview($review);
    //   $reviewsVersions = Review::getReviewVersions($review);
    //   $review = Review::getReview($review, $request->query('game_version'));
    //   return Inertia::render('Reviews/Index', ['review' => $review, 'gameVersions' => $gameVersions, 'reviewVersions' => $reviewsVersions]);
    // }

    public function show(Review $review): Response
    {
      // $gameVersions = Review::getGameVersionsByPlatformWithReview($review);
      // $reviewsVersions = Review::getReviewVersions($review);
      $versions = Review::getReviewVersionsAndGameVersionByPlatform($review);
      $review = Review::getReview($review);
      // print($review->platform->name);
      return Inertia::render('Reviews/Index', ['review' => $review, 'versions' => $versions]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatereviewRequest $request, review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(review $review)
    {
        //
    }
}
