<?php

namespace BrainGames\Games\Gcd;

use function \BrainGames\GameEngine\run;

const GAME_DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function getGcd(int $a, int $b)
{
    $a = abs($a);
    $b = abs($b);
    while ($a !== $b) {
        if ($a > $b) {
            $a -= $b;
        } else {
            $b -= $a;
        }
    }
    return $a;
}

function play()
{
    $task = function () {
        $firstNum = rand(1, 99);
        $secondNum = rand(1, 99);
        return "{$firstNum} {$secondNum}";
    };
    $correctAnswer = function ($numbers) {
        $numbersArr = explode(' ', $numbers);
        $a = $numbersArr[0];
        $b = $numbersArr[1];
        return (string) getGcd($a, $b);
    };

    run(GAME_DESCRIPTION, $task, $correctAnswer);
}
