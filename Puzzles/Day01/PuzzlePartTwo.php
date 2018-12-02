<?php

namespace Puzzles\Day01;

class PuzzlePartTwo extends Puzzle
{
    private $sum = 0;
    private $seen = [];

    public function processInput() 
    {
        while (1) {
            $line = trim(current($this->input));
            $this->sum += (int)$line;
            if (array_key_exists($this->sum, $this->seen)) {
                break;
            } else {
                $this->seen[$this->sum] = 1;
            }
            if (!next($this->input)) {
                reset($this->input);
            }
        }
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->sum . PHP_EOL;
    }
}
