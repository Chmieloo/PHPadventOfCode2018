<?php

namespace Puzzles\Day01;

class PuzzlePartTwo extends Puzzle
{
    private $sum = 0;

    public function processInput()
    {
        $string = $this->input[0];
        $len = strlen($string);
        $middle = $len / 2;
        for ($i = 0; $i <= strlen($string) - 1; $i++) {
            $next = $string[($i + $middle) % $len];
            $current = $string[$i];

            if ($next == $current) {
                $this->sum += $current;
            }
        }
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->sum . PHP_EOL;
    }
}
