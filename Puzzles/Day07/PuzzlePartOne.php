<?php

namespace Puzzles\Day07;

class PuzzlePartOne extends Puzzle
{
    private $sum = 0;

    public function processInput()
    {
        $array = [];
        foreach ($this->input as $line) {
            $parts = preg_split('/\s+/', $line);
            $array[$parts[0]] = [];
            $parts = array_filter($parts);

            if ($parts[2] == '->') {
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
        var_dump($diff);
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->sum . PHP_EOL;
    }
}
