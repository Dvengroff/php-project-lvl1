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
        $question = "{$num}";
        $answer = (isEven($num)) ? 'yes' : 'no';
        return ['question' => $question, 'answer' => $answer];
    };
    
    run(GAME_DESCRIPTION, $task);
}
