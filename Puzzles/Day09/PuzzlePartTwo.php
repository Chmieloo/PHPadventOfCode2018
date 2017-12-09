<?php

namespace Puzzles\Day09;

class PuzzlePartTwo extends Puzzle
{
    private $solution = 0;

    public function processInput()
    {
        $input = $this->input[0];

        $pattern = '/\!./';
        $cleanInput = preg_replace($pattern, '', $input);

        $pattern = '/\<(.*?)\>/';
        preg_match_all($pattern, $cleanInput, $matches);

        foreach ($matches[1] as $string) {
            $this->solution += strlen($string);
        }
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->solution . PHP_EOL;
    }
}
