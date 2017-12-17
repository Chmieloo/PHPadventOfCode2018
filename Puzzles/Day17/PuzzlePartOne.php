<?php

namespace Puzzles\Day17;

class PuzzlePartOne extends Puzzle
{
    private $array = [0];

    public function processInput()
    {
        $input = 345;
        $pointer = 0;

        for ($i = 1; $i <= 2017; $i++) {
            $pointer = ($pointer + $input) % count ($this->array);
            # Insert i after current pointer position
            array_splice($this->array, $pointer + 1, 0, $i);
            $pointer = ($pointer + 1) % count($this->array);
            echo $i. PHP_EOL;
        }

        $key = array_search('2017', $this->array);
        $this->solution1 = $this->array[$key + 1];
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->solution1 . PHP_EOL;
    }
}
