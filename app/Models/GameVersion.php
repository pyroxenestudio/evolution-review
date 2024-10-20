<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Game;
use App\Models\Platform;
use App\Models\Review;
use App\Models\GamePlatform;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\DB;
use PSpell\Dictionary;

class GameVersion extends Model
{
    use HasFactory;

    // QUERIES

    public function reviewLastOne(): HasOne
    {
      return $this->review()->one()->ofMany();
    }

    // RELATIONSHIPS

    public function reviews(): HasMany
    {
      return $this->hasMany(Review::class);
    }

    public function platforms(): BelongsToMany
    {
        return $this->belongsToMany(Platform::class, 'game_version_platforms')->withTimestamps();
    }

    public function games(): belongsToMany
    {
      return $this->belongsToMany(Game::class, 'game_game_versions');
    }

    public static function getGameVersionsByPlatformWithReview($gameId, $platformId) {
      // print($platformId);

      $patata = DB::table('reviews')
        ->select('game_versions.version')
        ->leftJoin('game_versions', 'game_versions.id', 'reviews.game_version_id')
        ->where('reviews.game_id', '=', $gameId)
        ->where('reviews.platform_id', '=', $platformId)
        ->get();


      // print($patata);
      return $patata;
    }
} 
