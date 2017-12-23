<?php

namespace Puzzles\Day20;

class PuzzlePartOne extends Puzzle
{
    private $positions = [];
    private $velocities = [];
    private $accelerations = [];

    private $distances = [];

    public function processInput()
    {
        foreach ($this->input as $line) {
            preg_match(
                '/p=<(-?\d+),(-?\d+),(-?\d+)>, v=<(-?\d+),(-?\d+),(-?\d+)>, a=<(-?\d+),(-?\d+),(-?\d+)>/',
                $line,
                $matches
                );

            $this->positions[] = [
                'x' => $matches[1],
                'y' => $matches[2],
                'z' => $matches[3],
            ];

            $this->velocities[] = [
                'x' => $matches[4],
                'y' => $matches[5],
                'z' => $matches[6],
            ];

            $this->accelerations[] = [
                'x' => $matches[7],
                'y' => $matches[8],
                'z' => $matches[9],
            ];

            $this->distances[] = abs($matches[1]) + abs($matches[2]) + abs($matches[3]);
        }

        $ticks = 1000;

        for ($i = 0; $i < $ticks; $i++) {
            foreach ($this->positions as $particleNumber => $particlePosition) {
                $this->velocities[$particleNumber]['x'] += $this->accelerations[$particleNumber]['x'];
                $this->velocities[$particleNumber]['y'] += $this->accelerations[$particleNumber]['y'];
                $this->velocities[$particleNumber]['z'] += $this->accelerations[$particleNumber]['z'];

                $this->positions[$particleNumber]['x'] += $this->velocities[$particleNumber]['x'];
                $this->positions[$particleNumber]['y'] += $this->velocities[$particleNumber]['y'];
                $this->positions[$particleNumber]['z'] += $this->velocities[$particleNumber]['z'];

                $this->distances[$particleNumber] =
                    abs($this->positions[$particleNumber]['x']) +
                    abs($this->positions[$particleNumber]['y']) +
                    abs($this->positions[$particleNumber]['z']);
            }
        }

        $min = min($this->distances);
        $this->solution1 = array_search($min, $this->distances);
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->solution1 . PHP_EOL;
    }
}
