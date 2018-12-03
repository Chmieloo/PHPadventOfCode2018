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
            list($x, $y) = explode(",", trim($data[2], ":"));
            list($w, $h) = explode("x", $data[3]);

            if ($x + $w > $maxW) {
                $maxW = $x + $w;
            }

            if ($y + $h > $maxH) {
                $maxH = $y + $h;
            }

            for ($i = $x; $i < ($x + $w); $i++) {
                for ($j = $y; $j < ($y + $h); $j++) {
                    $this->fabric[$i][$j][] = $id;
                }
            }
        }

        $candidates = [];
        foreach ($this->fabric as $row) {
            foreach ($row as $ids) {
                foreach ($ids as $id) {
                    if (array_key_exists($id, $candidates)) {
                        $candidates[$id] *= count($ids);
                    } else {
                        $candidates[$id] = 1;
                    }
                }
            }
        }

        print_r($candidates);

        $candidates = array_flip($candidates);
        $this->sum = $candidates[1];
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->sum . PHP_EOL;
    }
}
