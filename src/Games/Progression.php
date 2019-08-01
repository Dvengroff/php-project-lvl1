<?php

namespace BrainGames\Games\Progression;

use function \BrainGames\GameEngine\run;

const GAME_DESCRIPTION = 'What number is missing in the progression?';

function getProgression(int $first, int $step, int $count)
{
    $result[0] = $first;
    for ($i = 1; $i < $count; $i++) {
        $result[$i] = $result[$i - 1] + $step;
    }
    return $result;
}

function play()
{
    $task = function () {
        $first = rand(1, 10);
        $step = rand(1, 10);
        $count = 10;
        $progression = getProgression($first, $step, $count);
        $missingElemID = rand(0, $count - 1);
        $taskAnswer = $progression[$missingElemID];
        $progression[$missingElemID] = "..";
        $taskData = implode(' ', $progression);
        return ['data' => $taskData, 'answer' => (string) $taskAnswer];
    };

    run(GAME_DESCRIPTION, $task);
}
