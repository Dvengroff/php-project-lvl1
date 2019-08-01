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
        $num = rand(1, 99);
        $taskData = "{$num}";
        $taskAnswer = (isEven($num)) ? 'yes' : 'no';
        return ['data' => $taskData, 'answer' => $taskAnswer];
    };
    
    run(GAME_DESCRIPTION, $task);
}
