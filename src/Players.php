<?php

declare(strict_types=1);

namespace Game;

class Players
{
    private $player1;
    private $player2;

    public function __construct(Player $player1, Player $player2)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
    }

    public function getFirstPlayer(): Player
    {
        return $this->player1;
    }

    public function getSecondPlayer(): Player
    {
        return $this->player2;
    }

    public static function init(): self
    {
        return new Players(
            new Player('Player One'),
            new Player('Player Two')
        );
    }

    public function draw(): void
    {
        $this->player1->drawHand();
        $this->player2->drawHand();
    }
}
