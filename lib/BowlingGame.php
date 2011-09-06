<?php

class BowlingGame {
    private $rolls = array();

    public function roll($pins)
    {
        $this->rolls[] = $pins;
    }

    public function score()
    {
        $score = 0;
        $frameIndex = 0;

        for ($frame = 1; $frame <= 10; $frame++) {
            if ($this->isStrike($frameIndex)) {
                $score += 10 + $this->rolls[$frameIndex + 1] +
                               $this->rolls[$frameIndex + 2];
                $frameIndex++;
                continue;
            } elseif ($this->isSpare($frameIndex)) {
                $score += 10 + $this->rolls[$frameIndex + 2];
            } else {
                $score += $this->rolls[$frameIndex] + $this->rolls[$frameIndex + 1];
            }
            $frameIndex += 2;
        }

        return $score;
    }
    
    private function isStrike($frameIndex)
    {
        return $this->rolls[$frameIndex] == 10;
    }
    
    private function isSpare($frameIndex)
    {
        return $this->rolls[$frameIndex] + $this->rolls[$frameIndex + 1] == 10;
    }
    
    
}