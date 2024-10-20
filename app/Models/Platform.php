<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\hasMany;
use App\Models\Game;
use App\Models\GameVersion;
use App\Models\Review;

class Platform extends Model
{
    use HasFactory;

    public function games(): BelongsToMany
    {
        return $this->belongsToMany(Game::class)->withTimestamps();
    }

    public function gameVersions(): BelongsToMany
    {
      return $this->belongsToMany(GameVersion::class)->withTimestamps();
    }

    public function reviews(): hasMany
    {
      return $this->hasMany(Review::class);
    }
}
