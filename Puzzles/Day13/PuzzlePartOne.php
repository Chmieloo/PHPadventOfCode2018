<?php

namespace Puzzles\Day13;

class PuzzlePartOne extends Puzzle
{
    private $visited = [];
    private $graphData = [];

    private $scanners = [];
    private $layers = [];
    private $scannersDirs = [];

    public function processInput()
    {
        $layers = [];
        foreach ($this->input as $line) {
            $data = explode(':', $line);
            $this->layers[$data[0]] = trim($data[1]);
            $this->scanners[$data[0]] = 1;
            $this->scannersDirs[$data[0]] = 1;
        }

        $severity = 0;

        $length = max(array_keys($this->layers));

        var_dump($this->scanners);
        var_dump($this->scannersDirs);
        var_dump($this->layers);

        for ($cursor = 0; $cursor <= 1; $cursor++) {
            // Check if scanner is cursor layer has a value of 1
            if (array_key_exists($cursor, $this->scanners) && $this->scanners[$cursor] == 1) {
                $severity += $cursor * $this->layers[$cursor];
            }

            $this->updateScanners();
        }

        var_dump($severity);
    }

    private function updateScanners()
    {
        foreach ($this->scanners as $col => $position) {
            echo $this->scanners[$col] . ' ' . $this->layers[$col] . PHP_EOL;
            if ($this->scannersDirs[$col] == 1) {
                $position++;
                $this->scanners[$col] = $position;
                if ($this->scanners[$col] == $this->layers[$col]) {
                    $this->scannersDirs = -1;
                }
            } else {
                $this->scanners[$col]--;
                if ($this->scanners[$col] == 1) {
                    $this->scannersDirs = 1;
                }
            }
        }
        var_dump($this->scanners);
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->solution1 . PHP_EOL;
    }
}


