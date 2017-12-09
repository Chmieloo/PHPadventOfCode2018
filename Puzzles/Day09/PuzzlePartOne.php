<?php

namespace Puzzles\Day09;

class PuzzlePartOne extends Puzzle
{
    private $sum = 0;

    public function processInput()
    {
        $input = $this->input[0];

        $pattern = '/\!./';
        $cleanInput = preg_replace($pattern, '', $input);

        $pattern = '/\<([^\>]*)\>/';
        $cleanerInput = preg_replace($pattern, '', $cleanInput);

        $level = 0;
        for ($i = 0; $i < strlen($cleanerInput); $i++) {
            if ($cleanerInput[$i] == '{') {
                $level++;
                $this->sum += $level;
            } elseif ($cleanerInput[$i] == '}') {
                $level--;
            }
        }
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->sum . PHP_EOL;
    }
}


