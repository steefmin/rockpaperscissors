<?php

declare(strict_types=1);

namespace Game\Phases;

use Game\Results\RoundResult;
use Game\Results\SetResult;

class Set
{
    private $players;

    private $roundResults = [];

    public function __construct($players)
    {
        $this->players = $players;
    }

    public function addRoundResult(RoundResult $roundResult): void
    {
        array_push($this->roundResults, $roundResult);
    }

    public function play(): SetResult
    {
        do {
            $round = new Round($this->players);
            $this->addRoundResult($round->play());
        } while (!$this->hasWinner());

        return new SetResult($this->roundResults);
    }

    private function hasWinner(): bool
    {
        return $this->getLastRound()->hasWinner();
    }

    private function getLastRound(): RoundResult
    {
        return end($this->roundResults);
    }
}
