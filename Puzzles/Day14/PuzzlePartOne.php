<?php

namespace Puzzles\Day14;

class PuzzlePartOne extends Puzzle
{
    private $sum = 0;
    private $e1 = 3;
    private $e2 = 7;

    private $str = '';

    private $e1Pos = 0;
    private $e2Pos = 1;

    private $inputLength = 47801;

    public function processInput()
    {
        $this->str = $this->e1 . $this->e2;

        while (strlen($this->str) < $this->inputLength + 10) {
            $last2Sum = $this->str[$this->e1Pos] + $this->str[$this->e2Pos];
            $this->str .= $last2Sum;
            $this->moveElves();
        }

        //echo $this->str . PHP_EOL;
        $this->sum = substr($this->str, $this->inputLength, 10);
    }

    private function moveElves()
    {
        $movesE1 = 1 + $this->str[$this->e1Pos];
        $movesE2 = 1 + $this->str[$this->e2Pos];

        $this->e1Pos = ($this->e1Pos + $movesE1) % strlen($this->str);
        $this->e2Pos = ($this->e2Pos + $movesE2) % strlen($this->str);
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->sum . PHP_EOL;
    }
}
