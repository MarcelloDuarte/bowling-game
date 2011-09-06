<?php

require_once __DIR__ . '/../lib/BowlingGame.php';

class DescribeBowlingGame extends \PHPSpec\Context
{
    function before()
    {
        $this->game = $this->spec(new BowlingGame);
    }
    
    function itScoresZeroForAGutterGame()
    {
        $this->rollMany(20, 0);
        $this->score()->should->be(0);
    }
    
    function itScoresTheSumOfRollsWhenNoStrikesOrSparesAreMade()
    {
        $this->rollMany(20, 1);
        $this->score()->should->be(20);
    }
    
    function rollMany($times, $pins)
    {
        while ($times-- < 0) {
            $this->game->roll($pins);
        }
    }
    
    function score()
    {
        return $this->game->score();
    }
}