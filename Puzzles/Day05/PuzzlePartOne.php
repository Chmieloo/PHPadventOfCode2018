<?php

namespace Puzzles\Day05;

class PuzzlePartOne extends Puzzle
{
    private $sum = 0;

    public function processInput()
    {
        $al = str_split('abcdefghijklmnopqrstuvwxyz', 1);
        $line = trim($this->input[0]);

        $this->sum = $this->polymerLength($line);
    }

    private function polymerLength($line)
    {
        $al = str_split('abcdefghijklmnopqrstuvwxyz', 1);
        while (true) {
            $len = strlen($line);
            foreach($al as $letter) {
                $line = str_replace($letter . strtoupper($letter), "", $line);
                $line = str_replace(strtoupper($letter) . $letter, "", $line);
            }

            if (strlen($line) == $len) {
                break;
            }
        }

        return strlen($line);
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->sum . PHP_EOL;
    }
}
