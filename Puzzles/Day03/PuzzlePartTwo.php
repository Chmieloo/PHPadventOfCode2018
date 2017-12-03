<?php

namespace Puzzles\Day03;

class PuzzlePartTwo extends Puzzle
{
    private $sum = 0;
    private $sums;

    public function processInput()
    {
        $this->sums[0][0] = 1;

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
                    $this->fillSums($direction, $cX, $cY, $width, $height);
                    $cX += $width;
                    $i += $width;
                    $width++;
                    break;
                case 90:
                    $this->fillSums($direction, $cX, $cY, $width, $height);
                    $cY += $height;
                    $i += $height;
                    $height++;
                    break;
                case 180:
                    $this->fillSums($direction, $cX, $cY, $width, $height);
                    $cX -= $width;
                    $i += $width;
                    $width++;
                    break;
                case 270:
                    $this->fillSums($direction, $cX, $cY, $width, $height);
                    $cY -= $height;
                    $i += $height;
                    $height++;
                    break;
            }



            $direction = ($direction + 90) % 360;
        } while ($i < $searchValue);
    }

    private function fillSums($direction, $cX, $cY, $width, $height)
    {
        switch ($direction){
            case 0:
                for ($i = 1; $i <= $width; $i++) {
                    $this->sums[$cX + $i][$cY] = $this->sumN($cX + $i, $cY);
                }
                break;
            case 90:
                for ($i = 1; $i <= $height; $i++) {
                    $this->sums[$cX][$cY + $i] = $this->sumN($cX, $cY + $i);
                }
                break;
            case 180:
                for ($i = 1; $i <= $width; $i++) {
                    $this->sums[$cX - $i][$cY] = $this->sumN($cX - $i, $cY);
                }
                break;
            case 270:
                for ($i = 1; $i <= $height; $i++) {
                    $this->sums[$cX][$cY - $i] = $this->sumN($cX, $cY - $i);
                }
                break;
        }
    }

    private function sumN($x, $y)
    {
        $sum =
            (isset($this->sums[$x-1][$y-1]) ? $this->sums[$x-1][$y-1] : 0) +
            (isset($this->sums[$x][$y-1]) ? $this->sums[$x][$y-1] : 0) +
            (isset($this->sums[$x+1][$y-1]) ? $this->sums[$x+1][$y-1] : 0) +
            (isset($this->sums[$x-1][$y]) ? $this->sums[$x-1][$y] : 0) +
            (isset($this->sums[$x+1][$y]) ? $this->sums[$x+1][$y] : 0) +
            (isset($this->sums[$x-1][$y+1]) ? $this->sums[$x-1][$y+1] : 0) +
            (isset($this->sums[$x][$y+1]) ? $this->sums[$x][$y+1] : 0) +
            (isset($this->sums[$x+1][$y+1]) ? $this->sums[$x+1][$y+1] : 0);

        if ($sum > $this->input) {
            $this->sum = $sum;
            echo 'Solution: ' . $this->sum . PHP_EOL;
            exit();
        }

        return $sum;
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->sum . PHP_EOL;
    }
}
