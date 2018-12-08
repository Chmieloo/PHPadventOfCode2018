<?php

namespace Puzzles\Day08;

class PuzzlePartOne extends Puzzle
{
    private $sum = 0;
    private $tree = null;

    public function processInput()
    {
        $numbers = trim($this->input[0]);
        $numbers = explode(" ", $numbers);

        while (in_array(0, $numbers)) {
            $zeroIndex = array_search(0, $numbers);
            $numbers[$zeroIndex - 2]--;
            $numberOfMetadata = $numbers[$zeroIndex + 1];

            $splice = array_splice($numbers, $zeroIndex, ($numberOfMetadata + 2));
            $this->sum += array_sum(array_slice($splice, 2));
        }
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->sum . PHP_EOL;
    }
}
