Feature: Score a bowling game
  In order to save me from doing it in my head
  As a 10-pin bowler
  I want the program to calculate my bowling score for me

  Scenario: Gutter game
    Given I have started a new game of 10-pin bowling
    When I roll 20 gutter balls
    Then my score is 0 points

  Scenario: All ones
    Given I have started a new game of 10-pin bowling
    When I knock over 1 pin 20 times
    Then my score is 20 points

  Scenario: Game with one spare
    Given I have started a new game of 10-pin bowling
    When I knock over 8 pins
    And I knock over 2 pins
    And I knock over 3 pins
    And I roll 17 gutter balls
    Then my score is 16 points

  Scenario: Game with one strike
    Given I have started a new game of 10-pin bowling
    When I knock over 10 pins
    And I knock over 2 pins
    And I knock over 3 pins
    And I roll 16 gutter balls
    Then my score is 20 points

  Scenario: Perfect game
    Given I have started a new game of 10-pin bowling
    When I knock over 10 pins 12 times
    Then my score is 300 points

  Scenario: All 5s
    Given I have started a new game of 10-pin bowling
    When I knock over 5 pins 21 times
    Then my score is 150 points

  Scenario: 0-10 is not a strike
    Given I have started a new game of 10-pin bowling
    When I knock over 0 pins
    And I knock over 10 pins
    And I knock over 1 pin 18 times
    Then my score is 29 points

  Scenario: Game involving strikes and spares
    Given I have started a new game of 10-pin bowling
    When I roll balls scoring 10 5 5 10 5 5 10 5 5
    And I knock over 1 pin 8 times
    Then my score is 119 points