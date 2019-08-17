<?php

declare(strict_types=1);

namespace Game\Objects;

class Player
{
    private $name;

    private $hand;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getHand(): Hand
    {
        return $this->hand;
    }

    public function drawHand(): void
    {
        $this->hand = new Hand();
    }
}
