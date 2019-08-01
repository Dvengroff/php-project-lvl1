<?php

namespace BrainGames\GameEngine;

use function \cli\line;
use function \cli\prompt;

function run(string $description, $getTask, $getAnswer)
{
    line('Welcome to the Brain Games!');
    line($description);
    line();
    $name = prompt('May I have your name?', false, " ");
    line("Hello, %s!", $name);
    line();
    
    for ($i = 0; $i < 3; $i++) {
        $nextTask = $getTask();
        line("Question: %s", $nextTask);
        $userAnswer = prompt('Your answer', false, ": ");
        $correctAnswer = $getAnswer($nextTask);
    
        if ($userAnswer !== $correctAnswer) {
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, {$name}!");
            line();
            return false;
        } else {
            line('Correct!');
        }
    }
    
    line("Congratulations, {$name}!");
    line();
    return true;
}
