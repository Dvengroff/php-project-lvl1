<?php

namespace BrainGames\Games\Even;

use function \BrainGames\GameEngine\run;

const GAME_DESCRIPTION = 'Answer "yes" if number even otherwise answer "no".';

function isEven($num): bool
{
    return ($num % 2 === 0);
}

function play()
{
    $task = function () {
        return rand(1, 99);
    };
    $correctAnswer = function ($num) {
        return (isEven($num)) ? 'yes' : 'no';
    };
    
    run(GAME_DESCRIPTION, $task, $correctAnswer);
}
