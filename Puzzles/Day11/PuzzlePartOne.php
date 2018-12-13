<?php

namespace Puzzles\Day11;

class PuzzlePartOne extends Puzzle
{
    private $sum = 0;
    private $cells = null;
    private $powers = null;
    private $gridSerial = 3999;

    public function processInput()
    {
        for ($i = 1; $i <= 300; $i++) {
            for ($j = 1; $j <= 300; $j++) {
                $this->cells[$i][$j] = $this->getCellPower($i, $j);
            }
        }

        for ($i = 1; $i <= 298; $i++) {
            for ($j = 1; $j <= 298; $j++) {
                $coord = $i . '.' . $j;
                $this->powers[$coord] = $this->getTotalPower($i, $j);
            }
        }

        asort($this->powers);
        print_r($this->powers);
    }

    private function getCellPower($x, $y)
    {
        $rackId = $x + 10;
        $pLevel = $rackId * $y;
        $pLevel = $pLevel + $this->gridSerial;
        $pLevel *= $rackId;
        $hundreds = substr($pLevel, -3, 1);
        $pLevel = $hundreds - 5;

        return $pLevel;
    }

    private function getTotalPower($i, $j)
    {
        $totalPower =
            $this->cells[$i][$j] +
            $this->cells[$i][$j+1] +
            $this->cells[$i][$j+2] +
            $this->cells[$i+1][$j] +
            $this->cells[$i+1][$j+1] +
            $this->cells[$i+1][$j+2] +
            $this->cells[$i+2][$j] +
            $this->cells[$i+2][$j+1] +
            $this->cells[$i+2][$j+2];

        return $totalPower;
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->sum . PHP_EOL;
    }
}
