<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;


require_once 'PHPUnit/Autoload.php';
require_once 'PHPUnit/Framework/Assert/Functions.php';
require_once 'BowlingGame.php';

/**
 * Features context.
 */
class FeatureContext extends BehatContext
{

    /**
     * @Given /^I have started a new game of (\d+)-pin bowling$/
     */
    public function iHaveStartedANewGameOfPinBowling($argument1)
    {
        $this->game = new BowlingGame;
    }

    /**
     * @When /^I roll (\d+) gutter balls$/
     */
    public function iRollGutterBalls($pins)
    {
        $this->rollMany($pins, 0);
    }

    /**
     * @Then /^my score is (\d+) points$/
     */
    public function myScoreIsPoints($score)
    {
        assertSame($score, $this->score());
    }

    /**
     * @When /^I knock over (\d+) pin (\d+) times$/
     */
    public function iKnockOverPinTimes($pins, $times)
    {
        $this->rollMany($pins, $times);
    }

    /**
     * @When /^I knock over (\d+) pins$/
     */
    public function iKnockOverPins($pins)
    {
        $this->roll($pins);
    }

    /**
     * @When /^I knock over (\d+) pins (\d+) times$/
     */
    public function iKnockOverPinsTimes($pins, $times)
    {
        $this->rollMany($pins, $times);
    }

    /**
     * @When /^I roll balls scoring ([\d+ ?]*)$/
     */
    public function iRollBallsScoring($manyPins)
    {
        foreach (explode(' ', $manyPins) as $pins) {
            $this->roll($pins);
        }
    }
    
    private function roll($strike)
    {
        $this->game->roll($strike);
    }
    
    private function rollMany($pins, $strike)
    {
        while($pins-- > 0) {
            $this->game->roll($strike);
        }
    }
    
    private function score()
    {
        return $this->game->score();
    }
}
