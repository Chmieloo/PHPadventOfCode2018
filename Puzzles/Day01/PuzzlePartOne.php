<?php

namespace Puzzles\Day01;

class PuzzlePartOne extends Puzzle
{
    private $sum = 0;

    public function processInput()
    {
        $string = $this->input[0];
        $string = $string . $string[0];
        for ($i = 1; $i <= strlen($string) - 1; $i++) {
            $next = $string[$i];
            $current = $string[$i - 1];

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
