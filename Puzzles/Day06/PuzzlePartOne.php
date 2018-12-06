<?php

namespace Puzzles\Day06;

class PuzzlePartOne extends Puzzle
{
    private $coords = [];
    private $sum = 0;
    private $view;
    private $maxX;
    private $maxY;

    private $indexCount = [];

    public function processInput()
    {
        $maxX = 0;
        $maxY = 0;

        foreach ($this->input as $line) {
            $line = trim($line);
            $list = explode(", ", $line);

            // Get coordinates
            $this->coords[] = [$list[0], $list[1]];

            // Set boundaries
            if ($list[0] > $maxX) {
                $maxX = $this->maxX = $list[0];
            }
            if ($list[1] > $maxY) {
                $maxY = $this->maxY = $list[1];
            }
        }

        for ($i=0;$i<=$maxX;$i++) {
            for ($j=0;$j<=$maxY;$j++) {
                $distanceToClosestPoint = 1000000;
                $closestIndex = '.';
                foreach ($this->coords as $index => $point) {
                    $pointX = $point[0];
                    $pointY = $point[1];

                    $currentDistance = $this->getDistance($i, $j, $pointX, $pointY);
                    if ($currentDistance < $distanceToClosestPoint) {
                        $distanceToClosestPoint = $currentDistance;
                        $closestIndex = $index;
                    } elseif ($currentDistance == $distanceToClosestPoint) {
                        // if we have two points in the same distance, it is a "."
                        $closestIndex = '.';
                    }
                }

                $this->view[$i][$j] = $closestIndex;
                $this->indexCount[$closestIndex]++;
            }
        }

        for ($i=0;$i<=$maxX;$i++) {
            $index = $this->view[$i][0];
            unset($this->indexCount[$index]);
            $index = $this->view[$i][$maxY];
            unset($this->indexCount[$index]);
        }

        for ($i=0;$i<=$maxY;$i++) {
            $index = $this->view[0][$i];
            unset($this->indexCount[$index]);
            $index = $this->view[$maxX][$i];
            unset($this->indexCount[$index]);
        }

        arsort($this->indexCount);

        $this->sum = array_shift($this->indexCount);
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
