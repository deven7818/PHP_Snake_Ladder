<?php

/**
 * Uc-5
 * Program for Snake and ladder 
 * 1. Setting starting position to 0
 * 2. Player rolls the die to get a random number between 1 to 6.
 * 3. The Player then checks for a Option. They are No Play, Ladder or Snake.
 * 4. Repeat till player reaches to winning position 100.
 * 5. Ensure the player gets to exact winning position 100.
 */
class SnakeLadder
{
    const START_POSITION = 0;
    const NO_PLAY = 0;
    const LADDER = 1;
    const SNAKE = 2;
    public $position = 0;

    //Function to display welcome message
    function welcome()
    {
        echo "\nWelcome To Snake and Ladder\n";
    }

    /**
     * Function to check option Wheather it is ladder, snake or no play
     * checking with switch case using random dice
     */
    function option()
    {
        while ($this->position < 100) {
            $diceRoll = $this->rollDice();
            $optionCheck = rand(0, 2);

            echo "Option is : $optionCheck \n";
            switch ($optionCheck) {
                case SnakeLadder::LADDER:
                    if ($this->position + $diceRoll > 100) {
                        $this->position = $this->position;
                    } else {
                        $this->position += $diceRoll;
                    }
                    break;

                case SnakeLadder::SNAKE:
                    $this->position -= $diceRoll;
                    if ($this->position <= 0) {
                        $this->position = 0;
                    }
                    break;

                default:
                    $this->position = $this->position;
                    break;
            }
            echo "Position is : " . $this->position . "\n";
        }
    }

    //Function to assign start position to 0
    function rollDice()
    {
        //Roll die and get random number between 1 - 6
        $diceRoll = rand(1, 6);
        echo "\nNumber on dice is : $diceRoll \n";
        return $diceRoll;
    }
}
?>