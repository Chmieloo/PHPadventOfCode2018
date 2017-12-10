<?php

namespace Puzzles\Day10;

class PuzzlePartOne extends Puzzle
{
    private $solution = 0;

    public function processInput()
    {
        $list = range(0, 255);
        $listLen = count($list);
        $currentPosition = 0;
        $skipSize = 0;

        $input = explode(",", $this->input[0]);
        foreach ($input as $length) {
            $chunk = [];
            for ($i = $currentPosition; $i < ($currentPosition + $length); $i++) {
                $index = $i % $listLen;
                $chunk[] = $list[$index];
            }

            $chunk = array_reverse($chunk);

            for ($i = $currentPosition; $i < ($currentPosition + $length); $i++) {
                $index = $i % $listLen;
                $list[$index] = array_shift($chunk);
            }

            $currentPosition += ($length + $skipSize) % $listLen;
            $skipSize += 1;
        }
        $this->solution = $list[0] * $list[1];
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->solution . PHP_EOL;
    }
}


