<?php

namespace Puzzles\Day07;

class PuzzlePartOne extends Puzzle
{
    private $solution = 0;

    public function processInput()
    {
        $array = [];
        foreach ($this->input as $line) {
            $parts = preg_split('/\s+/', $line);
            $array[$parts[0]] = [];
            $parts = array_filter($parts);

            if (array_key_exists(2, $parts) && $parts[2] == '->') {
                for ($i = 3; $i < count($parts); $i++) {
                    $string = trim($parts[$i], ",");
                    $array[$parts[0]][] = $string;
                }
            }
        }

        $co = [];
        $childrenOnly = array_values(array_filter($array));
        foreach ($childrenOnly as $childrenArray) {
            $co = array_merge($co, $childrenArray);
        }
        $diff = array_diff(array_keys($array), $co);
        $this->solution = array_pop($diff);
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->solution . PHP_EOL;
    }
}
