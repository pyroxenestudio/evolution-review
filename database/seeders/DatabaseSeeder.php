<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Game;
use App\Models\Platform;
use App\Models\GameVersion;
use App\Models\GamePlatform;
use App\Models\Review;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Users
        User::factory(10)->create();

        // Platforms
        $platforms = Platform::factory(5)->sequence(
          ['name' => 'PC'],
          ['name' => 'PS5'],
          ['name' => 'XBOX ONE X'],
          ['name' => 'XBOX ONE S'],
          ['name' => 'NINTENDO SWITCH']
        )->create();

        // Games
        $games = Game::factory(3)
          ->hasAttached($platforms)
          ->create();

        $gameVersion = GameVersion::factory(6)
          ->hasAttached($games)
          ->hasAttached($platforms)
          ->create();

        // REVIEWS GAMES 0
        $reviewGame0 = Review::factory(1)
          ->for($gameVersion[0])
          ->for($platforms[0])
          ->for($games[0])
          ->create();

        $reviewGame00 = Review::factory(1)
          ->for($gameVersion[0])
          ->for($platforms[2])
          ->for($games[0])
          ->create();

        $reviewGame000 = Review::factory(1)
          ->for($gameVersion[0])
          ->for($platforms[1])
          ->for($games[0])
          ->create();

        // REVIEWS GAMES 1
        $reviewGame1 = Review::factory(1)
          ->for($gameVersion[0])
          ->for($platforms[0])
          ->for($games[1])
          ->create();

        $reviewGame1 = Review::factory(1)
          ->for($gameVersion[1])
          ->for($platforms[0])
          ->for($games[1])
          ->create();

        $reviewGame11 = Review::factory(1)
          ->for($gameVersion[0])
          ->for($platforms[4])
          ->for($games[1])
          ->create();

        $reviewGame111 = Review::factory(1)
          ->for($gameVersion[0])
          ->for($platforms[3])
          ->for($games[1])
          ->create();

        // REVIEWS GAMES 2
        $reviewGame2 = Review::factory(1)
          ->for($gameVersion[0])
          ->for($platforms[0])
          ->for($games[2])
          ->create();
        // SAME THAN $reviewGame2 BUT DIFFERENT VERSION REVIEW
        $reviewGame2 = Review::factory(1)
          ->for($gameVersion[0])
          ->for($platforms[0])
          ->for($games[2])
          ->create();

        $reviewGame22 = Review::factory(1)
          ->for($gameVersion[1])
          ->for($platforms[2])
          ->for($games[2])
          ->create();

        $reviewGame222 = Review::factory(1)
          ->for($gameVersion[3])
          ->for($platforms[1])
          ->for($games[2])
          ->create();

        // // Game Version
        // $gameVersion1 = GameVersion::factory(10)
        //   ->for($games[0])
        //   ->hasAttached($platforms)
        //   ->create();

        // $gameVersion2 = GameVersion::factory(10)
        //   ->for($games[1])
        //   ->hasAttached($platforms)
        //   ->create();

        // $gameVersion3 = GameVersion::factory(10)
        //   ->for($games[2])
        //   ->hasAttached($platforms)
        //   ->create();

        // // Game Version without Review
        // $gameVersion4 = GameVersion::factory(10)
        //   ->for($games[3])
        //   ->hasAttached($platforms)
        //   ->create();

        // // ONLY FOR PC
        // $gameVersionPC = GameVersion::factory(10)
        //   ->for($games[0])
        //   ->hasAttached($platforms[0])
        //   ->create();

        // // REVIEWS
        // $reviews = Review::factory(1)
        //   ->for($gameVersion1[0])
        //   ->create();

        // // ONLY FOR PC
        // $reviewsPC = Review::factory(1)
        //   ->for($gameVersionPC[0])
        //   ->create();

        // $reviewsPC = Review::factory(1)
        //   ->for($gameVersionPC[1])
        //   ->create();

        // $reviewsPC = Review::factory(1)
        //   ->for($gameVersionPC[2])
        //   ->create();

        // $reviews = Review::factory(1)
        //   ->for($gameVersion2[0])
        //   ->create();
        
        // $reviews = Review::factory(1)
        //   ->for($gameVersion3[0])
        //   ->create();

        // 4 Game Version to test review
        // $reviews = Review::factory(1)
        //   ->for($gameVersion4[0])
        //   ->create();

        

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
