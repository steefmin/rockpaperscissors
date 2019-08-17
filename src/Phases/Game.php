<?php

declare(strict_types=1);

namespace Game\Phases;

use Game\Exceptions\CheatException;
use Game\Objects\Player;
use Game\Objects\Players;
use Game\Results\GameResult;
use Game\Results\SetResult;
use Game\Phases\Set;

class Game
{
    public const WIN_LIMIT = 2;

    /**
     * @var Players
     */
    private $players;

    /**
     * @var SetResult[]
     */
    private $setResults = [];

    public function __construct(Players $players)
    {
        $this->players = $players;
    }


    public function run(): string
    {
        return $this->play()->print();
    }

    public static function gameOn(): string
    {
        $game = new self(Players::init());
        return $game->run();
    }

    private function play(): GameResult
    {
        while (!$this->haveWinner()) {
            $set = new Set($this->players);
            $setResult = $set->play();

            $this->addSetResult($setResult);
        }

        return new GameResult($this->getWinner(), $this->setResults);
    }

    private function addSetResult(SetResult $setResult): void
    {
        array_push($this->setResults, $setResult);
    }

    private function haveWinner(): bool
    {
        return $this->firstPlayerWon() || $this->secondPlayerWon();
    }

    private function firstPlayerWon(): bool
    {
        return $this->winLimitReached($this->players->getFirstPlayer());
    }

    private function secondPlayerWon(): bool
    {
        return $this->winLimitReached($this->players->getSecondPlayer());
    }

    private function winLimitReached(Player $player): bool
    {
        return $this->countSetWins($player) >= self::WIN_LIMIT;
    }

    private function countSetWins(Player $player): int
    {
        return sizeof(array_filter($this->setResults, function ($setResult) use ($player) {
            /** @var SetResult $setResult*/
            return $setResult->getWinner()->getName() === $player->getName();
        }));
    }

    private function getWinner(): Player
    {
        if ($this->firstPlayerWon()) {
            return $this->players->getFirstPlayer();
        }

        if ($this->secondPlayerWon()) {
            return $this->players->getSecondPlayer();
        }

        throw new CheatException('No game winner found');
    }
}
