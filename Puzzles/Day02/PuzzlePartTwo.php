<?php

namespace Puzzles\Day02;

class PuzzlePartTwo extends Puzzle
{
    private $sum = 0;

    public function processInput()
    {
        $strLen = strlen(trim($this->input[0]));
        $arrayLen = count($this->input);

        for($i = 0; $i < $arrayLen - 1; $i++) {
            for ($j = $i + 1; $j < $arrayLen; $j++) {
                $str1 = trim($this->input[$i]);
                $str2 = trim($this->input[$j]);

                $diff = similar_text($str1, $str2);
                if ($diff == $strLen - 1) {
                    break 2;
                }
            }
        }

        $this->sum = '';
        for ($i = 0; $i < strlen($str1); $i++) {
            if($str2[$i] == $str1[$i]) {
                $this->sum .= $str1[$i];
            }
        }
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->sum . PHP_EOL;
    }
}
