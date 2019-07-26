<?php

namespace BrainGames\BrainEven;

use function \cli\line;
use function \cli\prompt;

function isEven($num): bool
{
    return ($num % 2 === 0);    
}

function getRightAnswer($num): string
{
    if (isEven($num)) {
        return 'yes';
    } else {
        return 'no';
    }
}

function playBrainEven($userName)
{
    for ($i = 0; $i < 3; $i++) {
        $nextNum = rand(1, 99);
        line("Question: {$nextNum}");
        $userAnswer = prompt('Your answer', false, ": ");
        $rightAnswer = getRightAnswer($nextNum);
    
        if ($userAnswer !== $rightAnswer) {
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$rightAnswer}'.");
            line("Let's try again, {$userName}!");
            line();
            return false;
        } else {
            line('Correct!');
        }
    }
    
    line("Congratulations, {$userName}!");
    line();
    return true;
}