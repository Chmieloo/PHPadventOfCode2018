<?php

namespace Puzzles\Day17;

class PuzzlePartTwo extends Puzzle
{
    public function processInput()
    {
        $len = 1;
        $input = 345;
        $pointer = 0;
        $zeroIndex = 0;
        $search = 0;

        for ($i = 1; $i <= 50000000; $i++) {
            $pointer = ($pointer + $input) % $len;
            if ($pointer == $zeroIndex) {
                $search = $i;
            }
            $len++;
            $pointer = ($pointer + 1) % $len;
        }

        $this->solution2 = $search;
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->solution2 . PHP_EOL;
    }
}
