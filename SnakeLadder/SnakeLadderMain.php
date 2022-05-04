<?php

include "SnakeAndLadder.php";

/*
 * snake and ladder main class 
 * calling methods from SnakeAndLadder class 
 */
class SnakeLadderMain
{
    function main()
    {
        $snakeLadder = new SnakeLadder();
        $snakeLadder->welcome();
        $snakeLadder->startPosition();
    }
}

$main = new SnakeLadderMain();
$main->main();
?>