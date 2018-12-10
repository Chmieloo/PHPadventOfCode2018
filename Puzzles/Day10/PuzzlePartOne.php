<?php

namespace Puzzles\Day10;

class PuzzlePartOne extends Puzzle
{
    private $sum = 0;
    private $coords = [];
    private $prevCoords = [];
    private $speeds = [];

    private $minX = 0;
    private $minY = 0;
    private $maxX = 0;
    private $maxY = 0;

    private $width = 1000000;
    private $height = 1000000;
    private $newHeight = 0;

    public function processInput()
    {
        foreach ($this->input as $line) {
            $line = str_replace(["position=<", "> velocity=<", ">"], ["", ",", ""], trim($line));

            $line = explode(",", $line);
            list($x, $y, $sx, $sy) = [trim($line[0]), trim($line[1]), trim($line[2]), trim($line[3])];

            $this->coords[] = [$y, $x];
            $this->speeds[] = [$sy, $sx];
        }

        list($minX, $minY, $maxX, $maxY) = $this->getValues();
//        echo $this->newHeight . PHP_EOL;
//        $this->draw($minX, $maxX, $minY, $maxY);


        echo $this->newHeight . PHP_EOL;

        $count = 0;
        # Check height
        while ($this->newHeight < $this->height) {
            $this->prevCoords = $this->coords;
            $this->move();
            $this->height = $this->newHeight;
            list($minX, $minY, $maxX, $maxY) = $this->getValues();
            $count++;
        }

        echo $count . PHP_EOL;


        $this->draw($minX, $maxX, $minY, $maxY);


        //print_r($this->coords);
    }

    private function getValues()
    {
        $minX = INF;
        $minY = INF;
        $maxX = -INF;
        $maxY = -INF;

        foreach ($this->coords as $point) {
            if ($point[1] < $minX) {
                $minX = $point[1];
            }
            if ($point[1] > $maxX) {
                $maxX = $point[1];
            }
            if ($point[0] < $minY) {
                $minY = $point[0];
            }
            if ($point[0] > $maxY) {
                $maxY = $point[0];
            }
        }

        $this->newHeight = $maxY - $minY;

        return [$minX, $minY, $maxX, $maxY];
    }

    private function move()
    {
        foreach ($this->coords as $index => $point) {
            $speedY = $this->speeds[$index][0];
            $speedX = $this->speeds[$index][1];

            $this->coords[$index][0] += $speedY;
            $this->coords[$index][1] += $speedX;
        }
    }


    private function draw($minX, $maxX, $minY, $maxY)
    {
        $array = [];
        foreach ($this->prevCoords as $point) {
            $array[$point[0]][$point[1]] = 1;
        }

        for ($j = $minY; $j <= $maxY; $j++) {
            for ($i = $minX; $i <= $maxX; $i++) {
                if ($array[$j][$i] == 1) {
                    echo "#";
                } else {
                    echo ".";
                }
            }
            echo PHP_EOL;
        }
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->sum . PHP_EOL;
    }
}
