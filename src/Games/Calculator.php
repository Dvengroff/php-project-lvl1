<?php

namespace BrainGames\Games\Calculator;

use function \BrainGames\GameEngine\run;

const GAME_DESCRIPTION = 'What is the result of the expression?';
const OPERATORS = ['+', '-', "*"];

function play()
{
    $task = function () {
        $firstNum = rand(1, 99);
        $secondNum = rand(1, 99);
        $operator = OPERATORS[rand(0, count(OPERATORS) - 1)];
        $question = "{$firstNum} {$operator} {$secondNum}";
        switch ($operator) {
            case '+':
                $answer = $firstNum + $secondNum;
                break;
            case '-':
                $answer = $firstNum - $secondNum;
                break;
            case '*':
                $answer = $firstNum * $secondNum;
                break;
        }
        return ['question' => $question, 'answer' => (string) $answer];
    };

    run(GAME_DESCRIPTION, $task);
}
