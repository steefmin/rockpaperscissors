<?php

namespace Game;

class Game
{
    const WIN_LIMIT = 2;

    /**
     * @var Players
     */
    private $players;

    /**
     * @var SetResult[]
     */
    private $setResults = [];

    /**
     * DEMANDS
     * Best out of three
     * 2 CPU's
     * In terminal; no frameworks; step2 = unittestssdfsdfs
     * Who wins
     * all hands played and result of round
     * do the git
     */
    public function run(): string
    {
        return $this->play()->print();
    }

    public function __construct(Players $players)
    {
        $this->players = $players;
    }

    private function play(): GameResult
    {
        do {
            $set = new Set($this->players);
            $setResult = $set->play();

            $this->addSetResult($setResult);
        } while (!$this->haveWinner());

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
        return sizeof(array_filter($this->setResults, function ($setResult) use ($player)
        {
            /** @var SetResult $setResult*/
            return $setResult->getWinner()->getName() === $player->getName();
        }));
    }

    private function getWinner(): Player
    {
        if ($this->firstPlayerWon()){
            return $this->players->getFirstPlayer();
        }

        if ($this->secondPlayerWon()){
            return $this->players->getSecondPlayer();
        }

        throw new CheatException('No game winner found');
    }
}
