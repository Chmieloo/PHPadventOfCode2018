<?php

namespace Puzzles\Day15;

class PuzzlePartTwo extends Puzzle
{
    private $sum = 0;

    private $aFactor = 16807;
    private $bFactor = 48271;

    private $divider = 2147483647;

    public function processInput()
    {
        $prevA = 722;
        $prevB = 354;

        for ($i = 0; $i < 5000000; $i++) {
            $nA = $this->getNextA($prevA);
            $nB = $this->getNextB($prevB);

            $binA = str_pad(decbin($nA), 32, 0, STR_PAD_LEFT);
            $binB = str_pad(decbin($nB), 32, 0, STR_PAD_LEFT);

            $binA = substr($binA, -16);
            $binB = substr($binB, -16);

            if ($binA == $binB) {
                $this->sum++;
            }

            $prevA = $nA;
            $prevB = $nB;
        }

        $this->solution2 = $this->sum;
    }

    private function getNextA($prevA)
    {
        $nextA = $prevA;
        do {
            $nextA = ($prevA * $this->aFactor) % $this->divider;
            $prevA = $nextA;
        } while($nextA % 4 != 0);

        return $nextA;
    }

    private function getNextB($prevB)
    {
        $nextB = $prevB;
        do {
            $nextB = ($prevB * $this->bFactor) % $this->divider;
            $prevB = $nextB;
        } while($nextB % 8 != 0);

        return $nextB;
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->solution2 . PHP_EOL;
    }
}
