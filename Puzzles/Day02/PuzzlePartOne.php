<?php

namespace Puzzles\Day02;

class PuzzlePartOne extends Puzzle
{
    private $sum = 0;

    public function processInput()
    {
        $twos = 0;
        $threes = 0;
        foreach ($this->input as $line) {
            $lineLetters = str_split(trim($line));

            $lineCounts = [];
            foreach ($lineLetters as $lineLetter) {
                if (array_key_exists($lineLetter, $lineCounts)) {
                    $lineCounts[$lineLetter]++;
                } else {
                    $lineCounts[$lineLetter] = 1;
                }
            }

            $lineCounts = array_flip($lineCounts);

            if (array_key_exists(2, $lineCounts)) {
                $twos++;
            }
            if (array_key_exists(3, $lineCounts)) {
                $threes++;
            }
        }

        $this->sum = $twos * $threes;
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->sum . PHP_EOL;
    }
}
