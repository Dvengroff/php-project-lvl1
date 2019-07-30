<?php

namespace BrainGames\Games\BrainPrime;

use function \BrainGames\GameEngine\run;

function isPrime($num): bool
{
    if ($num < 2) {
        return false;
    }
    for ($i = 2; $i <= floor($num / 2); $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }
    return true;
}

function playBrainPrime()
{
    $gameDescription = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $task = function () {
        return rand(1, 99);
    };
    $correctAnswer = function ($num) {
        if (isPrime($num)) {
            return 'yes';
        } else {
            return 'no';
        }
    };
    
    run($gameDescription, $task, $correctAnswer);
}
