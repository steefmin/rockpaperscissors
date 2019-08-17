<?php

namespace Game;

class SetResult
{
    private $rounds;

    public function __construct( array $rounds)
    {
        $this->rounds = $rounds;
    }

    public function getReport(): string
    {
        $report = '';
        foreach ($this->rounds as $roundResult)
        {
            /** @var RoundResult $roundResult */
            $report .= $roundResult->toString() . "\r\n";
            if ($roundResult->hasWinner()){
                $report .= '--Set result: ' . $roundResult->getResult();
            }
        }
        return sprintf(
            "--Set of %d round(s) played: \r\n%s\r\n",
            $this->getNumberOfRounds(),
            $report
        );
    }

    private function getNumberOfRounds(): int
    {
        return sizeof($this->rounds);
    }

    public function getWinner(): Player
    {
        return end($this->rounds)->getWinner();
    }
}
