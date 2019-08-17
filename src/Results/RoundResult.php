<?php

declare(strict_types=1);

namespace Game\Results;

use Game\Objects\Hand;
use Game\Objects\Player;

class RoundResult
{
    private $winner;

    private $winningHand;

    private $losingHand;

    public function __construct(Hand $winningHand, Hand $losingHand, ?Player $winner)
    {
        $this->winningHand = $winningHand;
        $this->losingHand = $losingHand;
        $this->winner = $winner;
    }

    public function toString(): string
    {
        return sprintf(
            '  Round resulted in %s, %s',
            $this->getPlayedHands(),
            $this->getResult()
        );
    }

    public function getResult(): string
    {
        if ($this->hasWinner()) {
            return $this->winner->getName() . ' won';
        }

        return 'it\'s a draw';
    }

    public function getPlayedHands(): string
    {
        return sprintf(
            '%s vs %s',
            $this->winningHand->getType(),
            $this->losingHand->getType()
        );
    }

    public function hasWinner(): bool
    {
        return !is_null($this->winner);
    }

    public function getWinner(): ?Player
    {
        return $this->winner;
    }
}
