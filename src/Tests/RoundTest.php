<?php

declare(strict_types=1);

namespace Game;

use Game\Objects\Players;
use Game\Phases\Round;
use Game\Results\RoundResult;
use PHPUnit\Framework\TestCase;

class RoundTest extends TestCase
{
    public function testPlay()
    {
        $players = $this->createMock(Players::class);
        $round = new Round($players);
        $this->assertInstanceOf(RoundResult::class, $round->play());
    }
}
