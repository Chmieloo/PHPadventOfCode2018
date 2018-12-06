<?php

namespace Puzzles\Day06;

class PuzzlePartOne extends Puzzle
{
    private $coords = [];
    private $sum = 0;
    private $view;

    public function processInput()
    {
        $maxX = 0;
        $maxY = 0;
        foreach ($this->input as $line) {
            $line = trim($line);
            $list = explode(", ", $line);
            $this->coords[] = [$list[0], $list[1]];
            if ($list[0] > $maxX) {
                $maxX = $list[0];
            }
            if ($list[1] > $maxY) {
                $maxY = $list[1];
            }
        }

        foreach ($this->coords as $index => $point) {
            $pointX = $point[0];
            $pointY = $point[1];
            echo $pointX . PHP_EOL;
        }

        for ($i=0;$i<$maxX;$i++) {
            for ($j=0;$j<$maxY;$j++) {
                $closest = 1000000;
                $closestIndex = -1;
                foreach ($this->coords as $index => $point) {

                    $pointX = $point[0];
                    $pointY = $point[1];
                    //echo $pointX . PHP_EOL;

                    $dist = $this->getDistance($i, $j, $pointX, $pointY);
                    echo $dist . PHP_EOL;
                    if ($dist < $closest) {
                        $closest = $dist;
                        $closestIndex = $index;
                    }
                    elseif ($dist == $closest) {
                        // if we have two points in the same distance, it is a "."
                        $closestIndex = -1;
                    }
                }

                $this->view[$i][$j] = $closestIndex;
            }
        }

        $this->draw();
        $this->sum = strlen($line);
    }

    public function draw()
    {
        for ($i=0;$i<$maxX;$i++) {
            for ($j=0;$j<$maxY;$j++) {
                echo $this->view[$i][$j] . "\t";
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
