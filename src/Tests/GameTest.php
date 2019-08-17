<?php

declare(strict_types=1);

namespace Game\Tests;

use Game\Objects\Players;
use Game\Phases\Game;
use Game\Results\GameResult;
use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    public function testPlay()
    {
        $players = Players::init();
        $game = new Game($players);

        $this->assertInstanceOf(GameResult::class, $game->play());
    }

    public function testGameOn()
    {
        $this->assertIsString(Game::gameOn());
    }
}
