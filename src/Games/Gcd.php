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
        $question = "{$firstNum} {$secondNum}";
        $answer = getGcd($firstNum, $secondNum);
        return ['question' => $question, 'answer' => (string) $answer];
    };

    run(GAME_DESCRIPTION, $task);
}
