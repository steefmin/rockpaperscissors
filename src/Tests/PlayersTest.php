<?php

declare(strict_types=1);

namespace Game\Tests;

use Game\Objects\Player;
use Game\Objects\Players;
use PHPUnit\Framework\TestCase;

class PlayersTest extends TestCase
{
    /** @var Player */
    private $player1;

    /** @var Player */
    private $player2;

    private $players;

    protected function setUp(): void
    {
        $this->player1 = $this->createMock(Player::class);
        $this->player2 = $this->createMock(Player::class);
        $this->players = new Players($this->player1, $this->player2);
    }

    public function testInit()
    {
        $players = Players::init();
        $this->assertInstanceOf(Players::class, $players);
        $this->assertEquals('Player One', $players->getFirstPlayer()->getName());
        $this->assertEquals('Player Two', $players->getSecondPlayer()->getName());
    }

    public function testGetSecondPlayer()
    {
        $this->assertInstanceOf(Player::class, $this->players->getSecondPlayer());
    }

    public function testGetFirstPlayer()
    {
        $this->assertInstanceOf(Player::class, $this->players->getFirstPlayer());
    }

    public function testDraw()
    {
        $this->player1->expects($this->once())->method('drawHand');
        $this->player1->expects($this->once())->method('drawHand');
        $this->players->draw();
    }
}
