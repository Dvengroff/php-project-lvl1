<?php

namespace BrainGames\GameEngine;

use function \cli\line;
use function \cli\prompt;

function run($gameName)
{    
    line('Welcome to the Brain Games!');
    switch ($gameName) {
        case 'brain-games':
            break;
        case 'brain-even':
            line('Answer "yes" if number even otherwise answer "no".');
            break;
        case 'brain-calc':
            line('What is the result of the expression?');
            break;
    }
    line();
    $name = prompt('May I have your name?', false, " ");
    line("Hello, %s!", $name);
    line();
    return $name;
}
