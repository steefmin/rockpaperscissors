<?php

declare(strict_types=1);

namespace Game\Tests;

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

        $players->expects($this->once())->method('draw');

        $this->assertInstanceOf(RoundResult::class, $round->play());
    }
}
