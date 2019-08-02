<?php

namespace BrainGames\GameEngine;

use function \cli\line;
use function \cli\prompt;

const ROUNDS_COUNT = 3;

function run(string $description, $getTask)
{
    line('Welcome to the Brain Games!');
    line($description);
    line();
    $name = prompt('May I have your name?', false, " ");
    line("Hello, %s!", $name);
    line();
    
    for ($i = 1; $i <= ROUNDS_COUNT; $i++) {
        ['question' => $question, 'answer' => $answer] = $getTask();
        line("Question: %s", $question);
        $userAnswer = prompt('Your answer', false, ": ");

        if ($userAnswer !== $answer) {
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$answer}'.");
            line("Let's try again, {$name}!");
            line();
            exit();
        } else {
            line('Correct!');
        }
    }
    
    line("Congratulations, {$name}!");
    line();
}
