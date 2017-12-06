<?php

namespace Puzzles\Day06;

class PuzzlePartTwo extends Puzzle
{
    private $solution = 0;
    private $sum = 1;

    public function processInput()
    {
        $blocks = preg_split('/\s+/', $this->input[0]);

        $knownBlocks = [
            join(" ", $blocks)
        ];

        $index = 0;

        while (1) {
            $maxValue = $blocks[0];
            $maxIndex = 0;
            for ($i = 1; $i < count($blocks); $i++) {
                if ($blocks[$i] > $maxValue) {
                    $maxValue = $blocks[$i];
                    $maxIndex = $i;
                }
            }

            $blocks[$maxIndex] = 0;

            for ($j = 1; $j <= $maxValue; $j++) {
                $insertIndex = ($maxIndex + $j) % count($blocks);
                $blocks[$insertIndex]++;
            }
            $afterBlocks = $blocks;
            $joined = join(" ", $afterBlocks);
            if (in_array($joined, $knownBlocks)) {
                for ($i = 0; $i < count($knownBlocks); $i++) {
                    if ($knownBlocks[$i] == $joined) {
                        $index = $i;
                    }
                }
                break;
            } else {
                $this->sum++;
                $knownBlocks[] = join(" ", $afterBlocks);
            }
        }

        $this->solution = $this->sum - $index;
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->solution . PHP_EOL;
    }
}
