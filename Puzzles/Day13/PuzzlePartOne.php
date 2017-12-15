<?php

namespace Puzzles\Day13;

class PuzzlePartOne extends Puzzle
{
    private $layers = [];

    public function processInput()
    {
        foreach ($this->input as $line) {
            $data = explode(':', $line);
            $this->layers[$data[0]] = trim($data[1]);
        }

        $severity = 0;
        $length = max(array_keys($this->layers));

        for($i = 0; $i <= $length; $i++) {
            if (array_key_exists($i, $this->layers)) {
                if ($i % (($this->layers[$i] - 1) * 2) == 0) {
                    $severity += $this->layers[$i] * $i;
                }
            }
        }

        $this->solution1 = $severity;
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->solution1 . PHP_EOL;
    }
}


