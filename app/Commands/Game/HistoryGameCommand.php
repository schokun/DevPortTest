<?php

namespace App\Commands\Game;

use App\Models\Game;
use Illuminate\Database\Eloquent\Collection;

final class HistoryGameCommand
{
    public function execute(): Collection
    {
        $games = Game::where('user_id', auth()->id())->orderByDesc('id')->limit(3)->get();

        return $games;
    }
}
