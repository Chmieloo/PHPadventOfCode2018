<?php

namespace Puzzles\Day03;

class PuzzlePartOne extends Puzzle
{
    private $sum = 0;

    public function processInput()
    {
        $cX = 0;
        $cY = 0;

        $width = 1;
        $height = 1;

        $i = 1;
        $direction = 0;

        $searchValue = $this->input;

        do {
            switch ($direction) {
                case 0:
                    $cX += $width;
                    $i += $width;
                    $width++;
                    break;
                case 90:
                    $cY += $height;
                    $i += $height;
                    $height++;
                    break;
                case 180:
                    $cX -= $width;
                    $i += $width;
                    $width++;
                    break;
                case 270:
                    $cY -= $height;
                    $i += $height;
                    $height++;
                    break;
            }



            $direction = ($direction + 90) % 360;
        } while ($i < $searchValue);


        $direction = ($direction + 90) % 360;
        $distance = $i - $searchValue;

        switch ($direction) {
            case 0:
                $sX = $cX + $distance;
                $sY = $cY;
                break;
            case 90:
                $sX = $cX;
                $sY = $cY + $distance;
                break;
            case 180:
                $sX = $cX - $distance;
                $sY = $cY;
                break;
            case 270:
                $sX = $cX;
                $sY = $cY - $distance;
                break;
        }

        $this->sum = abs($sX) + abs($sY);
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->sum . PHP_EOL;
    }
}
