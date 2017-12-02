<?php

namespace Puzzles\Day02;

class PuzzlePartTwo extends Puzzle
{
    private $sum = 0;

    public function processInput()
    {
        foreach ($this->input as $line) {
            $splitLine = explode("\t", trim($line));
            $divisible = $this->findEvenlyDivisible($splitLine);
            $this->sum += $divisible;
        }
    }

    private function findEvenlyDivisible($array)
    {
        for ($i = 0; $i < count($array) - 1; $i++) {
            for ($j = $i + 1; $j < count($array); $j++) {
                $current = $array[$i];
                $next = $array[$j];

                $bigger = max($current, $next);
                $smaller = min($current, $next);

                if ($bigger % $smaller == 0) {
                    return ($bigger / $smaller);
                }
            }
        }
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->sum . PHP_EOL;
    }
}
