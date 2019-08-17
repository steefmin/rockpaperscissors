<?php


namespace Game;

class Round
{
    private $players;

    public function __construct(Players $players)
    {
        $this->players = $players;
    }

    public function play(): RoundResult
    {
        $this->players->draw();

        return $this->decide(
            $this->players->getFirstPlayer(),
            $this->players->getSecondPlayer()
        );
    }

    private function decide(Player $firstPlayer, Player $secondPlayer): RoundResult
    {
        if ($firstPlayer->getHand()->wonFrom($secondPlayer->getHand())) {
            return new RoundResult(
                $firstPlayer->getHand(),
                $secondPlayer->getHand(),
                $firstPlayer
            );
        }

        if ($secondPlayer->getHand()->wonFrom($firstPlayer->getHand())) {
            return new RoundResult(
                $secondPlayer->getHand(),
                $firstPlayer->getHand(),
                $secondPlayer
            );
        }

        return new RoundResult(
            $firstPlayer->getHand(),
            $secondPlayer->getHand(),
            null
        );
    }
}
