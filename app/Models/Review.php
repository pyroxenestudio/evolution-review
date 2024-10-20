<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\GameVersion;
use App\Models\Game;
use App\Models\Platform;
use Illuminate\Support\Facades\DB;

class Review extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
      'review',
      'create_at',
      'update_at'
    ];

    // RELATIONSHIPS
    public function gameVersion(): BelongsTo
    {
      return $this->BelongsTo(GameVersion::class);
    }

    public function game(): BelongsTo
    {
      return $this->belongsTo(Game::class);
    }

    public function platform(): BelongsTo
    {
      return $this->belongsTo(Platform::class);
    }

    // QUERIES
    public function lastGamesByReview()
    {
      return DB::table('reviews')->select(
        'reviews.updated_at as updated_at',
        'games.id as id',
        'games.title as title',
        DB::raw('group_concat(DISTINCT platforms.name) as platforms'))
        ->leftJoin('games', 'games.id', '=', 'reviews.game_id')
        ->leftJoin('platforms', 'platforms.id', '=', 'reviews.platform_id')
        ->leftJoin('game_versions', 'game_versions.id', '=', 'reviews.game_version_id')
        ->groupBy('games.id')
        ->limit(10)
        ->get();
    }

    public static function getReview(Review $review, $gameVersion = false)
    {
      // print('COSAS');
      if (!$gameVersion) {
        $data = DB::table('reviews')
          ->select(
            'games.title as title',
            'platforms.name as platform',
            'reviews.review as review',
            'reviews.base_score as base_score',
            'reviews.final_score as final_score',
            'reviews.version as review_version',
            'game_versions.version as game_version',
            'reviews.id'
          )
          ->leftJoin('games', 'games.id', '=', 'reviews.game_id')
          ->leftJoin('platforms', 'platforms.id', '=', 'reviews.platform_id')
          ->leftJoin('game_versions', 'game_versions.id', '=', 'reviews.game_version_id')
          ->where('reviews.id', '=', $review->id)
          ->first();
      } else {
        // print($gameVersion);
        $data = DB::table('reviews')
          ->select(
            'games.title as title',
            'platforms.name as platform',
            'reviews.review as review',
            'reviews.base_score as base_score',
            'reviews.final_score as final_score',
            'reviews.version as review_version',
            'game_versions.version as game_version'
          )
          ->leftJoin('games', 'games.id', '=', 'reviews.game_id')
          ->leftJoin('platforms', 'platforms.id', '=', 'reviews.platform_id')
          ->leftJoin('game_versions', 'game_versions.id', '=', 'reviews.game_version_id')
          // ->where('reviews.id', '=', $review->id)
          ->where('game_versions.version', '=' , $gameVersion)
          ->where('reviews.game_id', '=', $review->game_id)
          ->where('reviews.platform_id', '=', $review->platform_id)
          // ->where('reviews.game_version_id', '=', $review->game_version_id)
          ->first();
      }
        return $data;
    }

    public static function getGameVersionsByPlatformWithReview($review) {
      return DB::table('reviews')
        ->select('game_versions.version')
        ->leftJoin('game_versions', 'game_versions.id', '=', 'reviews.game_version_id')
        ->where('reviews.game_id', '=', $review->game_id)
        ->where('reviews.platform_id', '=', $review->platform_id)
        ->distinct()
        ->get();
    }

    public static function getReviewVersions($review)
    {
      return Review::where('reviews.game_id', '=', $review->game_id)
        ->where('reviews.platform_id', '=', $review->platform_id)
        ->where('reviews.game_version_id', '=', $review->game_version_id)
        ->select('version')
        ->get();
    }

    public static function getReviewVersionsAndGameVersionByPlatform($review)
    {
      return DB::table('reviews')
        ->select('game_versions.version as game_version', 'reviews.version as review_version', 'reviews.id as review_id')
        ->leftJoin('game_versions', 'game_versions.id', '=', 'reviews.game_version_id')
        ->where('reviews.game_id', '=', $review->game_id)
        ->where('reviews.platform_id', '=', $review->platform_id)
        ->distinct()
        ->get();
    }

    public function getReviewByGameId($reviewId)
    {
      return Review::find($reviewId);
    }
}
