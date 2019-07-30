<?php

namespace BrainGames\Games\BrainPrime;

use function \BrainGames\GameEngine\run;

function isEven($num): bool
{
    return ($num % 2 === 0);
}

function playBrainPrime()
{
    $gameDescription = 'Answer "yes" if number even otherwise answer "no".';
    $task = function () {
        return rand(1, 99);
    };
    $correctAnswer = function ($num) {
        if (isEven($num)) {
            return 'yes';
        } else {
            return 'no';
        }
    };
    
    run($gameDescription, $task, $correctAnswer);
}
