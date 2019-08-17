<?php

declare(strict_types=1);

namespace Game\Tests;

use Game\Objects\HandType;
use PHPUnit\Framework\TestCase;

class HandTypeTest extends TestCase
{
    public function testGetTypesArray()
    {
        $types = HandType::getTypesArray();
        $this->assertIsArray($types);
        $this->assertCount(3, $types);
    }

    public function testRockIsString()
    {
        $this->assertIsString(HandType::ROCK);
    }
    public function testPaperIsString()
    {
        $this->assertIsString(HandType::PAPER);
    }
    public function testScissorsIsString()
    {
        $this->assertIsString(HandType::SCISSORS);
    }
}
