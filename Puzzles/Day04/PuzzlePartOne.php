<?php

namespace Puzzles\Day04;

class PuzzlePartOne extends Puzzle
{
    private $sum = 0;

    public function processInput()
    {
        foreach ($this->input as $line) {
            $line = explode(" ", trim($line));
            $all = count($line);
            $uniques = count(array_unique($line));

            if ($all == $uniques) {
                $this->sum++;
            }
        }
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->sum . PHP_EOL;
    }
}
