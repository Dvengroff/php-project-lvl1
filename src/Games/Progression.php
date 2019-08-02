<?php

namespace BrainGames\Games\Progression;

use function \BrainGames\GameEngine\run;

const GAME_DESCRIPTION = 'What number is missing in the progression?';
const PROGRESSION_LENGH = 10;

function getProgression(int $first, int $step, int $lengh)
{
    for ($i = 0; $i < $lengh; $i++) {
        $result[$i] = $first + $step * $i;
    }
    return $result;
}

function play()
{
    $task = function () {
        $first = rand(1, 10);
        $step = rand(1, 10);
        $progression = getProgression($first, $step, PROGRESSION_LENGH);
        $missingElemID = rand(0, PROGRESSION_LENGH - 1);
        $answer = $progression[$missingElemID];
        $progression[$missingElemID] = "..";
        $question = implode(' ', $progression);
        return ['question' => $question, 'answer' => (string) $answer];
    };

    run(GAME_DESCRIPTION, $task);
}
