<?php

declare(strict_types=1);

namespace Game\Tests;

use Game\Objects\Hand;
use Game\Objects\HandType;
use PHPUnit\Framework\TestCase;

class HandTest extends TestCase
{
    /**
     * @dataProvider typesProvider
     * @param string $handType
     */
    public function testGetTypeIsString(string $handType)
    {
        $hand = new Hand($handType);
        $this->assertIsString($hand->getType());
    }

    /**
     * @return array
     */
    public static function typesProvider(): array
    {
        return array_map(function ($type) {
            return [$type];
        }, HandType::getTypesArray());
    }

    /**
     * @dataProvider typesProvider
     * @param $handType
     */
    public function testGetTypeIsHandType($handType)
    {
        $hand = new Hand($handType);
        $this->assertContains(
            $hand->getType(),
            HandType::getTypesArray()
        );
    }

    /**
     * @dataProvider winsProvider
     * @param string $handType1
     * @param string $handType2
     * @param bool $wins
     */
    public function testWonFrom(string $handType1, string $handType2, bool $wins)
    {
        $otherHand = new Hand($handType2);
        $subject = new Hand($handType1);
        $this->assertEquals($wins, $subject->wonFrom($otherHand));
    }

    public function winsProvider(): array
    {
        return [
            [HandType::ROCK, HandType::ROCK, false],
            [HandType::ROCK, HandType::PAPER, false],
            [HandType::ROCK, HandType::SCISSORS, true],
            [HandType::PAPER, HandType::PAPER, false],
            [HandType::PAPER, HandType::ROCK, true],
            [HandType::PAPER, HandType::SCISSORS, false],
            [HandType::SCISSORS, HandType::SCISSORS, false],
            [HandType::SCISSORS, HandType::ROCK, false],
            [HandType::SCISSORS, HandType::PAPER, true],
        ];
    }
}
