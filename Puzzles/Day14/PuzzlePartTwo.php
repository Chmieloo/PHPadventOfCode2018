<?php

namespace Puzzles\Day14;

class PuzzlePartTwo extends Puzzle
{
    private $grid = [];
    private $groups = [];

    public function processInput()
    {
        for ($i = 0; $i < 128; $i++) {
            $hash = $this->knotHash('ffayrhll-' . $i);
            //$hash = $this->knotHash('flqrgnkx-' . $i);
            $hash = str_pad($hash, 32, '0', STR_PAD_LEFT);
            $hash = str_split($hash);
            $row = '';
            foreach ($hash as $char) {
                $bin = base_convert($char, 16, 2);
                $bin = str_pad($bin, 4, '0', STR_PAD_LEFT);
                $row .= $bin;
            }

            $row = str_split($row);
            $this->grid[$i] = $row;
        }

        $this->displayGrid(' ');

        $group = 0;
        foreach ($this->grid as $v => &$rowe) {
            foreach ($rowe as $c => &$colz) {
                if ($colz === "1") {
                    $group++;
                    $this->grid[$v][$c] = $group;
                    $this->setNeighbours($this->grid, $v, $c);
                }
            }
        }

        echo $group;
    }

    function setNeighbours(&$values, $row, $col) {
        foreach ([[$row+1,$col], [$row-1,$col], [$row,$col+1], [$row,$col-1]] as $i) {
            list($r,$c) = $i;
            if (isset($values[$r][$c]) && $values[$r][$c] === "1") {
                $values[$r][$c] = $values[$row][$col];
                $this->setNeighbours($values, $r,$c);
            }
        }
    }

    private function displayGrid($separator = '')
    {
        $cols = count($this->grid[0]);
        $rows = count($this->grid);
        for ($i = 0; $i < $rows; $i++) {
            for ($j = 0; $j < $cols; $j++) {
                echo str_pad($this->grid[$i][$j], 1, 0, STR_PAD_LEFT) . $separator;
            }
            echo PHP_EOL;
        }
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->solution2 . PHP_EOL;
    }
}
