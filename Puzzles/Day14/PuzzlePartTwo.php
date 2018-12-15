<?php

namespace Puzzles\Day14;

class PuzzlePartTwo extends Puzzle
{
    private $sum = 0;
    private $e1 = 3;
    private $e2 = 7;

    private $str = '';

    private $e1Pos = 0;
    private $e2Pos = 1;

    public function processInput()
    {
        $this->str = $this->e1 . $this->e2;

        $findme = '047801';
        $len = 2;

        $sl = strlen($findme);

        while (1) {
            if ($len > $sl) {
                if (substr($this->str, -$sl) == $findme) {
                    $this->sum = strlen($this->str) - $sl;
                    break;
                }
                if (substr($this->str, -$sl - 1, $sl) == $findme) {
                    $this->sum = strlen($this->str) - $sl - 1;
                    break;
                }
            }

            $last2Sum = $this->str[$this->e1Pos] + $this->str[$this->e2Pos];
            $this->str .= $last2Sum;
            $len += strlen($last2Sum);
            $this->moveElves();
        }
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
