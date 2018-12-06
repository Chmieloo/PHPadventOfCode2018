<?php

namespace Puzzles\Day06;

class PuzzlePartTwo extends Puzzle
{
    private $coords = [];
    private $sum = 0;
    private $view;
    private $maxX;
    private $maxY;

    public function processInput()
    {
        $maxX = 0;
        $maxY = 0;
        $i = 0;

        foreach ($this->input as $line) {
            $line = trim($line);
            $list = explode(", ", $line);
            $this->coords[] = [$list[0], $list[1]];
            if ($list[0] > $maxX) {
                $maxX = $this->maxX = $list[0];
            }
            if ($list[1] > $maxY) {
                $maxY = $this->maxY = $list[1];
            }

            $i++;
        }

        $dta = 0;

        for ($i=0;$i<=$maxX;$i++) {
            for ($j=0;$j<=$maxY;$j++) {
                $distToAll = 0;
                foreach ($this->coords as $index => $point) {

                    $pointX = $point[0];
                    $pointY = $point[1];
                    $dist = $this->getDistance($i, $j, $pointX, $pointY);
                    $distToAll += $dist;

                }

                $this->view[$i][$j] = $distToAll;
                if ($distToAll < 10000) {
                    $dta++;
                }
            }
        }

        $this->sum = $dta;
    }

    public function draw()
    {
        for ($i=0;$i<=$this->maxX+1;$i++) {
            for ($j=0;$j<=$this->maxY+1;$j++) {
                echo $this->view[$j][$i] . "\t";
            }
            echo PHP_EOL;
        }
    }

    public function getDistance($x1, $y1, $x2, $y2)
    {
        $dist = (abs($x2 - $x1) + abs($y2 - $y1));
        return $dist;
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->sum . PHP_EOL;
    }
}
