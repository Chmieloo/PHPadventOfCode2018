<?php

namespace Puzzles\Day03;

error_reporting(E_ERROR);
class PuzzlePartTwo extends Puzzle
{
    private $sum = 0;
    private $nonOverlap;

    private $fabric = [];

    public function processInput()
    {
        $maxW = 0;
        $maxH = 0;
        foreach ($this->input as $line) {
            // #1 @ 896,863: 29x19
            $line = trim($line);
            $data = explode(" ", $line);
            $id = $data[0];
            //$this->nonOverlap = $id;
            list($x, $y) = explode(",", trim($data[2], ":"));
            list($w, $h) = explode("x", $data[3]);

            if ($x + $w > $maxW) {
                $maxW = $x + $w;
            }

            if ($y + $h > $maxH) {
                $maxH = $y + $h;
            }

            $checkSum = 0;
            for ($i = $x; $i < ($x + $w); $i++) {
                for ($j = $y; $j < ($y + $h); $j++) {
                    if (array_key_exists($i, $this->fabric) && array_key_exists($j, $this->fabric[$i])) {
                        $this->fabric[$i][$j]++;
                        $checkSum += $this->fabric[$i][$j];
                    } else {
                        $this->fabric[$i][$j] = 1;
                        $checkSum += 1;
                    }
                }
            }
            echo $data[3] . ' ' . $checkSum . PHP_EOL;
            if ($checkSum == ($w * $h)) {
                $this->nonOverlap = $id;
            }
        }

        for ($i = 0; $i < $maxH; $i++) {
            for ($j = 0; $j < $maxW; $j++) {
                if (!$this->fabric[$i][$j]) {
                    echo '. ';
                } else {
                    echo $this->fabric[$i][$j] . ' ';
                }
            }
            echo PHP_EOL;
        }

        echo $this->nonOverlap . PHP_EOL;
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->sum . PHP_EOL;
    }
}
