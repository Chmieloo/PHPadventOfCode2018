<?php

namespace Puzzles\Day20;

class PuzzlePartTwo extends Puzzle
{
    private $positions = [];
    private $velocities = [];
    private $accelerations = [];

    private $distances = [];
    private $posUniques = [];

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

            $this->posUniques[] = $matches[1] . '.' . $matches[2] . '.' . $matches[3];

            $this->distances[] = abs($matches[1]) + abs($matches[2]) + abs($matches[3]);
        }

        $ticks = 100;

        for ($c = 0; $c < $ticks; $c++) {
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

                if (!is_null($this->posUniques[$particleNumber])) {
                    $this->posUniques[$particleNumber] =
                        $this->positions[$particleNumber]['x'] . '.' .
                        $this->positions[$particleNumber]['y'] . '.' .
                        $this->positions[$particleNumber]['z'];
                }
            }

            for ($i = 0; $i < count($this->posUniques) - 1; $i++) {
                $value = $this->posUniques[$i];
                if (!is_numeric($value)) {
                    for ($j = $i + 1; $j < count($this->posUniques); $j++) {
                        if ($this->posUniques[$j] == $value) {
                            $this->posUniques[$j] = null;
                            $this->posUniques[$i] = null;
                        }
                    }
                }
            }
        }

        $this->posUniques = array_filter($this->posUniques);

        $this->solution2 = count($this->posUniques);
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->solution2 . PHP_EOL;
    }
}
