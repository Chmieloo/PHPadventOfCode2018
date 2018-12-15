<?php

namespace Puzzles\Day13;
error_reporting(E_ALL);

class PuzzlePartTwo extends Puzzle
{
    private $sum = 0;
    private $cells = null;
    private $powers = null;
    private $gridSerial = 18;
    private $gridSize = 300;

    public function processInput()
    {
        for ($i = 1; $i <= $this->gridSize; $i++) {
            for ($j = 1; $j <= $this->gridSize; $j++) {
                $this->cells[$i][$j] = $this->getCellPower($i, $j);
            }
        }

        $top = 0;
        $size = 300
        ;
        $solution = '';

        //for ($size = 1; $size <= 300; $size++) {

            for ($i = 1; $i <= 1; $i++) {
                for ($j = 1; $j <= 1; $j++) {
                    $coord = $i . ',' . $j . ',' . $size;


                    $this->powers[$coord] = $this->getTotalPower($i, $j, $size);

                    /*
                    if ($new > $top) {
                        $top = $new;
                        $solution = $coord;
                    }
                    */

                    echo $coord . PHP_EOL;
                }
            }

        //}


        //asort($this->powers);
        //print_r($this->powers);

        echo $solution . PHP_EOL;
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

    private function getTotalPower($i, $j, $size)
    {
        $totalPower = 0;
        for ($x = $i; $x <= $x + $size - 1; $x++) {
            for ($y = $j; $y <= $y + $size - 1; $y++) {
                echo $this->cells[$x][$y];
                $totalPower += isset($this->cells[$x][$y]) ? $this->cells[$x][$y] : 0;
            }
        }

        return $totalPower;
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->sum . PHP_EOL;
    }
}
