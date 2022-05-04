<?php

/**
 * Uc-5
 * Program for Snake and ladder 
 * 1. Setting starting position to 0
 * 2. Player rolls the die to get a random number between 1 to 6.
 * 3. The Player then checks for a Option. They are No Play, Ladder or Snake.
 * 4. Repeat till player reaches to winning position 100.
 * 5. Ensure the player gets to exact winning position 100.
 * 6. Report the number of times the dice was played to win the game and also the position after every die role
 * 7. Play the game with 2 Player.In this case if a Player gets a Ladder then plays again. 
 *    Finally report which Player won the game
 */
class SnakeLadder
{
    const NO_PLAY = 0;
    const LADDER = 1;
    const SNAKE = 2;

    public $positionPlayer1 = 0;
    public $diceCountPlayer1 = 0;
    public $positionPlayer2 = 0;
    public $diceCountPlayer2 = 0;

    //Function to display welcome message
    function welcome()
    {
        echo "\nWelcome To Snake and Ladder\n";
    }

    /**
     * Function to check option Wheather it is ladder, snake or no play
     * checking with switch case using random dice
     */
    function option($position)
    {
        $diceRoll = $this->rollDice();
        $optionCheck = rand(0, 2);
        echo "Option is : $optionCheck \n";

        switch ($optionCheck) {

            case SnakeLadder::LADDER:
                if ($position + $diceRoll > 100) {
                    $position = $position;
                } else {
                    $position += $diceRoll;
                }
                echo "Position is : " . $position . "\n";
                $position = $this->option($position);
                break;

            case SnakeLadder::SNAKE:
                $position -= $diceRoll;
                if ($position <= 0) {
                    $position = 0;
                }
                break;

            default:
                $position = $position;
                break;
        }
        return $position;
    }


    //Function to assign start position to 0
    function rollDice()
    {
        //Roll die and get random number between 1 - 6
        $diceRoll = rand(1, 6);
        echo "\nNumber on dice is : $diceRoll \n";
        return $diceRoll;
    }

    
    /**
     * Function player1() to Play the game for player 1
     * Calling the option function and getting player 1 position
     * printing the position of the player 1
     */
    function player1()
    {
        $this->diceCountPlayer1++;
        $this->positionPlayer1 = $this->option($this->positionPlayer1);
        echo "Position of player 1 is : " . $this->positionPlayer1 . "\n";
        if ($this->positionPlayer1 == 100) {
            echo "Player 1 is Win the Game.\n";
            echo "Total number of dice roll count is : " . $this->diceCountPlayer1 . "\n";
            echo "Position of player 1 is :" . $this->positionPlayer1 . "\n";
        }
    }

    /**
     * Function player2() to Play the game for player 2
     * Calling the option function and getting player 2 position
     * printing the position of the player 2
     */
    function player2()
    {
        $this->diceCountPlayer2++;
        $this->positionPlayer2 = $this->option($this->positionPlayer2);
        echo "Position of player 2 is : " . $this->positionPlayer2 . "\n";
        if ($this->positionPlayer2 == 100) {
            echo "Player 2 is Win the Game.\n";
            echo "Total number of dice roll count is : " . $this->diceCountPlayer2 . "\n";
            echo "Position of player 2 is :" . $this->positionPlayer2 . "\n";
        }
    }

    /**
     * Function for play the game with 2 players
     * calling player1() and player2() function to play the game 
     */
    function playGame()
    {
        $start = rand(1, 2);
        while ($this->positionPlayer1 < 100 && $this->positionPlayer2 < 100) {
            if ($start == 1) {
                $this->player1();
                if ($this->positionPlayer1 == 100 || $this->positionPlayer2 == 100) {
                    break;
                } else {
                    $this->player2();
                }
            } else {
                $this->player2();
                if ($this->positionPlayer1 == 100 || $this->positionPlayer2 == 100) {
                    break;
                } else {
                    $this->player1();
                }
            }
        }
        echo "The Game End...";
    }
}
?>