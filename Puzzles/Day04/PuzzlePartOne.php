<?php

namespace Puzzles\Day04;

class PuzzlePartOne extends Puzzle
{
    private $fabric = [];
    private $sum = 0;

    public function processInput()
    {
        usort($this->input, [$this, "dateSort"]);
        print_r($this->input);
    }

    private static function dateSort($a, $b) {
        $x = trim($a);
        $y = trim($b);
        $x = explode("]", $x);
        $y = explode("]", $y);
        $a = trim($x[0], "[]");
        $b = trim($y[0], "[]");
        
        return strtotime($a) - strtotime($b);
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->sum . PHP_EOL;
    }
}
