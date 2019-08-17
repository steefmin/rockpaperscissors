<?php

declare(strict_types=1);

namespace Game\Objects;

class HandType
{
    public const ROCK = 'rock';
    public const PAPER = 'paper';
    public const SCISSORS = 'scissors';

    public static function getTypesArray(): array
    {
        return [
            self::ROCK,
            self::PAPER,
            self::SCISSORS,
        ];
    }
}
