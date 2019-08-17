<?php

declare(strict_types=1);

namespace Game\Tests;

use Game\Objects\Hand;
use Game\Objects\Player;
use PHPUnit\Framework\TestCase;

class PlayerTest extends TestCase
{
    private const TEST_NAME = 'testPlayer';

    public function testGetName()
    {
        $player = new Player(self::TEST_NAME);
        $this->assertIsString($player->getName());
        $this->assertEquals(self::TEST_NAME, $player->getName());
    }

    public function testGetHand()
    {
        $player = new Player(self::TEST_NAME);
        $this->assertInstanceOf(Hand::class, $player->getHand());
    }

    public function testDrawHand()
    {
        $player = new Player(self::TEST_NAME);
        $this->assertInstanceOf(Hand::class, $player->getHand());
        $player->drawHand();
        $this->assertInstanceOf(Hand::class, $player->getHand());
    }
}
