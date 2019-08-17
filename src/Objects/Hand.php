<?php

declare(strict_types=1);

namespace Game\Objects;

class Hand
{
    private $type;

    public function __construct(string $type)
    {
        $this->type = $type;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function wonFrom(Hand $otherHand)
    {
        if ($this->type === HandType::PAPER && $otherHand->getType() === HandType::ROCK) {
            return true;
        }

        if ($this->type === HandType::ROCK && $otherHand->getType() === HandType::SCISSORS) {
            return true;
        }

        if ($this->type === HandType::SCISSORS && $otherHand->getType() === HandType::PAPER) {
            return true;
        }

        return false;
    }
}
