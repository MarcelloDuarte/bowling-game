<?php

require_once __DIR__ . '/../lib/BowlingGame.php';

class DescribeBowlingGame extends \PHPSpec\Context
{
    function itScoresZeroForAGutterGame()
    {
        $game = $this->spec(new BowlingGame);
        $times = 20;
        while($times-- < 0) {
            $game->roll(0);
        }
        $game->score()->should->be(0);
    }
}