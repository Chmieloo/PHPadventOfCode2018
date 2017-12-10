<?php

namespace Puzzles\Day10;

class PuzzlePartTwo extends Puzzle
{
    private $solution = 0;

    public function processInput()
    {
        $list = range(0, 255);
        $listLen = count($list);
        $currentPosition = 0;
        $skipSize = 0;

        $input = str_split(trim($this->input[0]));

        $newInput = '';
        foreach ($input as $char) {
            $newInput .= ord($char) . ',';
        }
        $newInput .= '17,31,73,47,23';
        $input = explode(",", $newInput);

        for ($x = 0; $x < 64; $x++) {
            foreach ($input as $length) {
                $chunk = [];
                for ($i = $currentPosition; $i < ($currentPosition + $length); $i++) {
                    $index = $i % $listLen;
                    $chunk[] = $list[$index];
                }
                $chunk = array_reverse($chunk);

                for ($i = $currentPosition; $i < ($currentPosition + $length); $i++) {
                    $index = $i % $listLen;
                    $list[$index] = array_shift($chunk);
                }

                $currentPosition += ($length + $skipSize) % $listLen;
                $skipSize += 1;
            }
        }

        $string = '';
        for ($i = 0; $i < 16; $i++) {
            $chunk = array_slice($list, $i*16, 16);
            $value = $chunk[0] ^  $chunk[1] ^  $chunk[2] ^  $chunk[3] ^  $chunk[4] ^  $chunk[5] ^
                $chunk[6] ^  $chunk[7] ^  $chunk[8] ^  $chunk[9] ^  $chunk[10] ^  $chunk[11] ^
                $chunk[12] ^  $chunk[13] ^  $chunk[14] ^  $chunk[15];

            $string .= dechex($value);
        }

        $this->solution = $string;
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->solution . PHP_EOL;
    }
}
