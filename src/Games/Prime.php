<?php

namespace BrainGames\Games\Prime;

use function \BrainGames\GameEngine\run;

const GAME_DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

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

function play()
{
    $task = function () {
        $num = rand(1, 99);
        $taskData = "{$num}";
        $taskAnswer = (isPrime($num)) ? 'yes' : 'no';
        return ['data' => $taskData, 'answer' => $taskAnswer];
    };
    
    run(GAME_DESCRIPTION, $task);
}
