<?php

namespace Puzzles\Day06;

error_reporting(E_ERROR);
class PuzzlePartTwo extends Puzzle
{
    private $sum = 0;
    private $nonOverlap;

    private $fabric = [];

    public function processInput()
    {
        $tst = 'abcdefghijklmnopqrstuvwxyz';
        $tst = str_split($tst, 1);
        $line = trim($this->input[0]);

        $result = [];
        foreach($tst as $letter) {
            $line = trim($this->input[0]);
            $line = str_replace($letter, "", $line);
            $line = str_replace(strtoupper($letter), "", $line);
            do {
                $changes = 0;
                for ($i=0;$i<strlen($line);$i++) {
                    if (strtolower($line[$i]) == strtolower($line[$i+1])  && !($line[$i] === $line[$i+1])) {
                        $line[$i] = 0;
                        $line[$i+1] = 0;
                        $changes++;
                    }

                    $line = str_replace(0, "", $line);
                }
            }
            while ($changes > 0);
            $result[$letter] = strlen($line);
        }

        asort($result);
        $this->sum = array_shift($result);
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->sum . PHP_EOL;
    }
}
