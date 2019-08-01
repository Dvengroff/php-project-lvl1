<?php

namespace BrainGames\Games\Calculator;

use function \BrainGames\GameEngine\run;

const GAME_DESCRIPTION = 'What is the result of the expression?';

function play()
{
    $task = function () {
        $operators = ['+', '-', "*"];
        $firstNum = rand(1, 99);
        $secondNum = rand(1, 99);
        $operator = $operators[rand(0, count($operators) - 1)];
        $taskData = "{$firstNum} {$operator} {$secondNum}";
        switch ($operator) {
            case '+':
                $taskAnswer = $firstNum + $secondNum;
                break;
            case '-':
                $taskAnswer = $firstNum - $secondNum;
                break;
            case '*':
                $taskAnswer = $firstNum * $secondNum;
                break;
        }
        return ['data' => $taskData, 'answer' => (string) $taskAnswer];
    };

    run(GAME_DESCRIPTION, $task);
}
