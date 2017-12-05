<?php

namespace Puzzles\Day05;

class PuzzlePartOne extends Puzzle
{
    private $sum = 0;

    public function processInput()
    {
        foreach ($this->input as $key => $line) {
            $this->input[$key] = (int)trim($line);
        }

        $start = 0;
        $end = count($this->input) - 1;
        $currentIndex = 0;

        while ($currentIndex >= $start && $currentIndex <= $end) {
            $steps = $this->input[$currentIndex];
            $oldIndex = $currentIndex;
            $currentIndex = $currentIndex + $steps;
            $this->input[$oldIndex]++;
            $this->sum++;
        }
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->sum . PHP_EOL;
    }
}
