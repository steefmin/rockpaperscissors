<?php

require 'vendor/autoload.php';

$game = new \Game\Game(\Game\Players::init());

echo $game->run();
