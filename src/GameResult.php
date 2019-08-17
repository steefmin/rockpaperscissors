<?php


namespace Game;

class GameResult
{
    private $setResults;

    private $winner;

    public function __construct(Player $winner, array $setResults)
    {
        $this->winner = $winner;
        $this->setResults = $setResults;
    }

    public function print(): string
    {
        return sprintf(
            "Game played of %d/%d sets:\r\n%sGame won by: %s\r\n",
            $this->getNumberOfSets(),
            $this->getMaxNumberOfSets(),
            $this->generateGameReport(),
            $this->getWinner()->getName()
        );
    }

    private function getNumberOfSets(): int
    {
        return sizeof($this->setResults);
    }

    private function getMaxNumberOfSets(): int
    {
        return Game::WIN_LIMIT * 2 - 1;
    }

    private function getWinner(): Player
    {
        return $this->winner;
    }

    private function generateGameReport(): string
    {
        $report = array_map(function ($setResult) {
            /** @var SetResult $setResult */
            return $setResult->getReport();
        }, $this->setResults);

        return implode('', $report);
    }
}
