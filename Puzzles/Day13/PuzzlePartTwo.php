<?php

namespace Puzzles\Day13;

class PuzzlePartTwo extends Puzzle
{
    private $layers = [];

    public function processInput()
    {
        foreach ($this->input as $line) {
            $data = explode(':', $line);
            $this->layers[$data[0]] = trim($data[1]);
        }

        $delay = 0;
        $scanning = true;
        $length = max(array_keys($this->layers));

        while($scanning) {
            $scanning = false;
            for ($i = 0; $i <= $length; $i++) {
                if (array_key_exists($i, $this->layers)) {
                    if (($i + $delay) % (($this->layers[$i] - 1) * 2) == 0) {
                        $scanning = true;
                        $delay++;
                        break;
                    }
                }
            }
        }

        $this->solution2 = $delay;
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->solution2 . PHP_EOL;
    }
}
