<?php

namespace BrainGames\BrainCalc;

use function \cli\line;
use function \cli\prompt;

function getRightAnswer($a, $b, $operator)
{
    $result = 0;
    switch ($operator) {
        case '+':
            $result = $a + $b;
            break;
        case '-':
            $result = $a - $b;
            break;
        case '*':
            $result = $a * $b;
            break;
    }
    return $result;
}

function playBrainCalc($userName)
{
    $operators = ['+', '-', "*"];
    for ($i = 0; $i < 3; $i++) {
        $firstNum = rand(1, 99);
        $secondNum = rand(1, 99);
        $operator = $operators[rand(0, count($operators) - 1)];

        line("Question: {$firstNum} {$operator} {$secondNum}");
        $userAnswer = prompt('Your answer', false, ": ");
        $rightAnswer = getRightAnswer($firstNum, $secondNum, $operator);
    
        if ((int)$userAnswer !== $rightAnswer) {
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
