<?php

namespace Puzzles\Day01;

class PuzzlePartOne extends Puzzle
{
    private $sum = 0;
    private $seen = [];

    public function processInput()
    {
        foreach ($this->input as $line) {
            $line = trim($line);
            $this->sum += $line;
        }
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->sum . PHP_EOL;
    }
}
