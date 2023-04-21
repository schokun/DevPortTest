<?php

namespace App\Commands\Game;

use App\Models\Game;

final class PlayGameCommand
{
    public function execute(): Game
    {
        $number = rand(1, 1000);

        if ($number % 2 !== 0) {
            return $this->saveGame('lose', 0, $number);
        }

        if ($number > 900) {
            return $this->saveGame('win', $number * (70 / 100), $number);
        }

        if ($number > 600) {
            return $this->saveGame('win', $number * (50 / 100), $number);
        }

        if ($number > 300) {
            return $this->saveGame('win', $number * (30 / 100), $number);
        }

        return $this->saveGame('win', $number * (10 / 100), $number);
    }


    private function saveGame(string $status, float $sum, int $number): Game
    {
        $game = new Game();

        $game->status = $status;
        $game->win_sum = $sum;
        $game->number = $number;
        $game->user_id = auth()->id();

        $game->save();

        return $game;
    }
}
