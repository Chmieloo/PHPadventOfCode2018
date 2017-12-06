<?php

namespace Puzzles\Day06;

class PuzzlePartOne extends Puzzle
{
    private $sum = 1;

    public function processInput()
    {
        $blocks = preg_split('/\s+/', $this->input[0]);

        $knownBlocks = [
            join(" ", $blocks)
        ];

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
            if (in_array(join(" ", $afterBlocks), $knownBlocks)) {
                break;
            } else {
                $this->sum++;
                $knownBlocks[] = join(" ", $afterBlocks);
            }
        }

    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->sum . PHP_EOL;
    }
}
