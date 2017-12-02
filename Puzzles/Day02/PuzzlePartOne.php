<?php

namespace Puzzles\Day02;

class PuzzlePartOne extends Puzzle
{
    private $sum = 0;

    public function processInput()
    {
        foreach ($this->input as $line) {
            $splitLine = explode("\t", trim($line));

            $biggestNumber = max($splitLine);
            $smallestNumber = min($splitLine);
            $difference = $biggestNumber - $smallestNumber;
            $this->sum += $difference;
        }
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->sum . PHP_EOL;
    }
}
