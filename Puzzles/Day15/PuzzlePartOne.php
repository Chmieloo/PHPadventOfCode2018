<?php

namespace Puzzles\Day15;

class PuzzlePartOne extends Puzzle
{
    private $sum = 0;

    public function processInput()
    {
        $prevA = 722;
        $prevB = 354;

        $aFactor = 16807;
        $bFactor = 48271;

        $divider = 2147483647;

        for ($i = 0; $i < 40000000; $i++) {
            $nextA = ($prevA * $aFactor) % $divider;
            $nextB = ($prevB * $bFactor) % $divider;

            $binA = str_pad(decbin($nextA), 32, 0, STR_PAD_LEFT);
            $binB = str_pad(decbin($nextB), 32, 0, STR_PAD_LEFT);

            $binA = substr($binA, -16);
            $binB = substr($binB, -16);

            if ($binA == $binB) {
                $this->sum++;
            }

            $prevA = $nextA;
            $prevB = $nextB;
        }

        $this->solution1 = $this->sum;
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->solution1 . PHP_EOL;
    }
}


