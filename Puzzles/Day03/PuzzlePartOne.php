<?php

namespace Puzzles\Day03;

class PuzzlePartOne extends Puzzle
{
    private $fabric = [];
    private $sum = 0;

    public function processInput()
    {
        foreach ($this->input as $line) {
            // #1 @ 896,863: 29x19
            $line = trim($line);
            $data = explode(" ", $line);
            list($x, $y) = explode(",", trim($data[2], ":"));
            list($w, $h) = explode("x", $data[3]);
            for ($i = $x; $i < ($x + $w); $i++) {
                for ($j = $y; $j < ($y + $h); $j++) {
                    if (array_key_exists($i, $this->fabric) && array_key_exists($j, $this->fabric[$i])) {
                        $this->fabric[$i][$j]++;
                    } else {
                        $this->fabric[$i][$j] = 1;
                    }
                }
            }
        }

        foreach ($this->fabric as $line) {
            foreach ($line as $value) {
                if ($value >= 2) {
                    $this->sum++;
                }
            }
        }
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->sum . PHP_EOL;
    }
}
