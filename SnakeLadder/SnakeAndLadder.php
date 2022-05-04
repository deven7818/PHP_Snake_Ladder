<?php

/**
 * Uc-2
 * Program for Snake and ladder 
 * 1. Setting starting position to 0
 * 2. Player rolls the die to get a random number between 1 to 6.
 */
class SnakeLadder
{
    //Function to display welcome message
    function welcome()
    {
        echo "\nWelcome To Snake and Ladder\n";
    }

    //Function to assign start position to 0
    function startPosition()
    {
        $startPosition = 0;
        echo "\nStart Position : $startPosition";
        //Roll die and get random number between 1 - 6
        $diceRoll = rand(1, 6);
        echo "\nPosition of the player is : $diceRoll";
    }
}
?>