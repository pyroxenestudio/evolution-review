<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Platform;
use App\Models\GameVersion;
use App\Models\Review;
use Illuminate\Support\Facades\DB;

class Game extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
      'title',
      'web',
      'created_at',
      'updated_at'
    ];

    // RELATIONSHIP
    public function reviews(): hasMany
    {
      return $this->hasMany(Review::class);
    }

    public function platforms(): BelongsToMany
    {
        return $this->belongsToMany(Platform::class, 'game_platforms')->withTimestamps();
    }

    public function gameVersions(): BelongsToMany
    {
        return $this->belongsToMany(GameVersion::class)->withTimestamps();
    }

    // QUERIES
    public function getAllByLastReview()
    {
      $gameVersions = GameVersion::orderBy('updated_at', 'desc')->distinct()->get();
      $games = Array();
      foreach($gameVersions as $gv) {
        $games[] = $gv->game;
      }
      print($gameVersions);
      // var_dump($games);
      return $games;
    }

    public static function getLastReviewsPerPlatforms(Game $game)
    {
      $reviews = DB::table('games')
        ->select(
          'game_versions.version as game_version',
          'platforms.name as platform',
          'reviews.id as review_id',
          'reviews.base_score as base_score',
          'reviews.final_score as final_score',
          'reviews.version as review_version',
          'game_versions.version as game_version'
        )
        ->leftJoin('reviews', 'reviews.game_id', '=', 'games.id')
        ->leftJoin('platforms', 'platforms.id', '=', 'reviews.platform_id')
        ->leftJoin('game_versions', 'game_versions.id', '=', 'reviews.game_version_id')
        ->where('games.id', '=', $game->id)
        ->groupBy('platforms.id')
        ->get();
      // print($reviews);

      return $reviews;
    }
}
