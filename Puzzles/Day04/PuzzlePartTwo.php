<?php

namespace Puzzles\Day04;

class PuzzlePartTwo extends Puzzle
{
    private $sum = 0;

    public function processInput()
    {
        foreach ($this->input as $line) {
            $line = explode(" ", trim($line));
            if (!$this->hasAnagrams($line)) {
                $this->sum++;
            }
        }
    }

    private function hasAnagrams($line)
    {
        for ($i = 0; $i < count($line) - 1; $i++) {
            for ($j = $i + 1; $j < count($line); $j++) {
                if ($this->isAnagram(trim($line[$i]), trim($line[$j]))) {
                    return true;
                }
            }
        }

        return false;
    }

    function isAnagram($a, $b)
    {
        if (count_chars($a, 1) == count_chars($b, 1)) {
            return true;
        } else {
            return false;
        }
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->sum . PHP_EOL;
    }
}
