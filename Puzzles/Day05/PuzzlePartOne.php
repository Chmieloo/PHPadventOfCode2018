<?php

namespace Puzzles\Day05;

class PuzzlePartOne extends Puzzle
{
    private $fabric = [];
    private $sum = 0;

    public function processInput()
    {
        $line = trim($this->input[0]);

        do {
            $changes = 0;
            for ($i=0;$i<strlen($line);$i++) {
                if (strtolower($line[$i]) == strtolower($line[$i+1])  && !($line[$i] === $line[$i+1])) {
                    $line[$i] = 0;
                    $line[$i+1] = 0;
                    $changes++;
                }

                $line = str_replace(0, "", $line);
            }
        }
        while ($changes > 0);

        $this->sum = strlen($line);
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->sum . PHP_EOL;
    }
}
