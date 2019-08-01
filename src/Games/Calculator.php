<?php

namespace BrainGames\Games\Calculator;

use function \BrainGames\GameEngine\run;

function play()
{
    $gameDescription = 'What is the result of the expression?';
    $task = function () {
        $operators = ['+', '-', "*"];
        $firstNum = rand(1, 99);
        $secondNum = rand(1, 99);
        $operator = $operators[rand(0, count($operators) - 1)];
        return "{$firstNum} {$operator} {$secondNum}";
    };
    $correctAnswer = function ($expression) {
        $expressionArr = explode(' ', $expression);
        $a = $expressionArr[0];
        $b = $expressionArr[2];
        $operator = $expressionArr[1];
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
        return (string) $result;
    };

    run($gameDescription, $task, $correctAnswer);
}
