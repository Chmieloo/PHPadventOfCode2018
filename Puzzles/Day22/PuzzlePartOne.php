<?php

namespace Puzzles\Day22;

class PuzzlePartOne extends Puzzle
{
    private $map = [];
    private $direction = 0;
    private $infections = 0;

    private $x;
    private $y;

    public function processInput()
    {
        foreach ($this->input as $line) {
            $this->map[] = str_split(trim($line));
        }

        $initialRowLength = count($this->map[0]);

        for ($i = 0; $i < 500; $i++) {
            $row = array_fill(0, $initialRowLength, '.');
            array_unshift($this->map, $row);
            $this->map[] = $row;
        }

        $add = array_fill(0, 500, '.');
        foreach ($this->map as $key => $line) {
            $this->map[$key] = array_merge($add, $line, $add);
        }

        $this->x = $this->y = floor(count($this->map) / 2);

        $iterations = 10000;

        for ($i = 0; $i < $iterations; $i++) {
            $x = $this->x;
            $y = $this->y;
            $currentNode = $this->map[$x][$y];

            switch ($currentNode) {
                case '.':
                    $this->direction = ($this->direction + 270) % 360;
                    $this->map[$x][$y] = '#';
                    $this->infections++;
                    break;
                case '#':
                    $this->direction = ($this->direction + 90) % 360;
                    $this->map[$x][$y] = '.';
                    break;
            }

            switch ($this->direction) {
                case 0:
                    $this->x--;
                    break;
                case 90:
                    $this->y++;
                    break;
                case 180:
                    $this->x++;
                    break;
                case 270:
                    $this->y--;
                    break;
            }
        }

        $this->solution1 = $this->infections;
    }

    private function showMap()
    {
        foreach ($this->map as $row => $line) {
            echo $row . ': ' . join(' ', $line) . PHP_EOL;
        }
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->solution1 . PHP_EOL;
    }
}
