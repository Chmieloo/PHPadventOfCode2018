<?php

namespace Puzzles\Day14;

use Puzzles\Abstraction\Puzzle as PuzzleAbstract;

/**
 * Puzzle day 14
 * Common class for day 14
 * Advent Of Code 2017
 */
class Puzzle extends PuzzleAbstract
{
    protected $runTime;
    protected $solution1;
    protected $solution2;

    public function __construct()
    {
        $this->loadInput();
        $this->processInput();
    }

    protected function loadInput()
    {
        if (file_exists(__DIR__ . '/' . static::$fileName)) {
            $this->input = file(__DIR__ . '/' . static::$fileName);
        }
    }

    /**
     * @param $input
     * @return string
     */
    public function knotHash($input)
    {
        $list = range(0, 255);
        $listLen = count($list);
        $currentPosition = 0;
        $skipSize = 0;

        $input = str_split(trim($input));

        $newInput = '';
        foreach ($input as $char) {
            $newInput .= ord($char) . ',';
        }
        $newInput .= '17,31,73,47,23';
        //$newInput = substr($newInput, 0, -1);
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

        return $string;
    }

    /**
     * @return null
     */
    public function renderSolution()
    {
        return null;
    }
}
