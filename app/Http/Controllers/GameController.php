<?php

namespace App\Http\Controllers;

use App\Commands\Game\{
        PlayGameCommand,
        HistoryGameCommand
};
use Illuminate\Http\JsonResponse;

class GameController extends Controller
{
    /**
     * @var PlayGameCommand
     */
    private PlayGameCommand $playGameCommand;

    /**
     * @var HistoryGameCommand
     */
    private HistoryGameCommand $historyGameCommand;

    public function __construct(
       PlayGameCommand $playGameCommand,
       HistoryGameCommand $historyGameCommand
    )
    {
        $this->playGameCommand = $playGameCommand;
        $this->historyGameCommand = $historyGameCommand;
    }

    public function play(): JsonResponse
    {
        $result = $this->playGameCommand->execute();

        return response()->json($result);
    }

    public function history(): JsonResponse
    {
        $historyGames = $this->historyGameCommand->execute();

        return response()->json($historyGames);
    }
}
