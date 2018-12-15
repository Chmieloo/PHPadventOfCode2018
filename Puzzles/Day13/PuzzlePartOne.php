<?php

namespace Puzzles\Day13;
error_reporting(E_ALL);

class PuzzlePartOne extends Puzzle
{
    private $sum = 0;

    private $map;
    private $cars = ['^', 'v', '<', '>'];
    private $carPositions = [];

    public function processInput()
    {
        $lineNumber = 0;
        foreach ($this->input as $line) {
            $this->map[$lineNumber] = str_split($line);
            $lineNumber++;
        }

        $this->draw();
        $this->getInitialCarPositions();

        print_r($this->carPositions);

    }

    private function move()
    {
        for ($i = 0; $i < count($this->map); $i++) {
            for ($j = 0; $j < strlen($this->map[$i]); $j++) {
                //if (in_array()$map[$i][$j])$x = 1;
                $x = 1;
            }
        }
    }

    private function getInitialCarPositions()
    {
        for ($i = 0; $i < count($this->map); $i++) {
            for ($j = 0; $j < strlen($this->map[$i]); $i++) {
                if (in_array($this->map[$i][$j], $this->cars)) {
                    $this->carPositions[] = [
                        'x' => $j,
                        'y' => $i,
                        'next' => 'L'
                    ];
                }
            }
        }
    }

    private function draw()
    {
        foreach ($this->map as $line) {
            $l = join("", $line);
            echo $l . PHP_EOL;
        }
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->sum . PHP_EOL;
    }
}
