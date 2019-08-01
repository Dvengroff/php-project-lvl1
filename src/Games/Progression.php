<?php

namespace BrainGames\Games\Progression;

use function \BrainGames\GameEngine\run;

function getProgression(int $first, int $step, int $count)
{
    $result[0] = $first;
    for ($i = 1; $i < $count; $i++) {
        $result[$i] = $result[$i - 1] + $step;
    }
    return $result;
}

function findElementNumber(array $progression, $element)
{
    foreach ($progression as $key => $value) {
        if ($value === $element) {
            return $key;
        }
    }
}

function findElementValue(array $progression, int $number)
{
    if (($number > 0)
        && ($number < (count($progression) - 1))
    ) {
        $value = ($progression[$number - 1] + $progression[$number + 1]) / 2;
    }
    if ($number === 0) {
        $step = $progression[$number + 2] - $progression[$number + 1];
        $value = $progression[$number + 1] - $step;
    }
    if ($number === (count($progression) - 1)) {
        $step = $progression[$number - 1] - $progression[$number - 2];
        $value = $progression[$number - 1] + $step;
    }
    return $value;
}

function play()
{
    $gameDescription = 'What number is missing in the progression?';
    $task = function () {
        $first = rand(1, 10);
        $step = rand(1, 10);
        $count = 10;
        $progression = getProgression($first, $step, $count);
        $progression[rand(0, $count - 1)] = "..";
        return implode(' ', $progression);
    };
    $correctAnswer = function ($progressionString) {
        $progression = explode(' ', $progressionString);
        $element = "..";
        $numberOfElement = findElementNumber($progression, $element);
        $missingElement = findElementValue($progression, $numberOfElement);
        return (string) $missingElement;
    };

    run($gameDescription, $task, $correctAnswer);
}
