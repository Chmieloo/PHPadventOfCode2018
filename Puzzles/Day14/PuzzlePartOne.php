<?php

namespace Puzzles\Day14;

class PuzzlePartOne extends Puzzle
{
    public function processInput()
    {
        $num = 0;
        for ($i = 0; $i < 128; $i++) {
            $hash = $this->knotHazh('ffayrhll-' . $i);
            $hash = str_split($hash);
            foreach ($hash as $char) {
                $bin = base_convert($char, 16, 2);
                $bin = str_pad($bin, 4, '0', STR_PAD_LEFT);
                $num += substr_count($bin, "1");
            }
        }

        echo $num . PHP_EOL;
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->solution1 . PHP_EOL;
    }
}


