<?php

namespace Puzzles\Day04;

class PuzzlePartOne extends Puzzle
{
    private $sum = 0;
    private $runTime;

    public function processInput()
    {
        $start = microtime(true);
        foreach ($this->input as $line) {
            $line = explode(" ", trim($line));
            $all = count($line);
            $uniques = count(array_unique($line));

            if ($all == $uniques) {
                $this->sum++;
            }
        }
        $this->runTime = microtime(true) - $start;
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->sum . PHP_EOL;
        echo 'Run time: ' . $this->runTime . PHP_EOL;
    }
}
