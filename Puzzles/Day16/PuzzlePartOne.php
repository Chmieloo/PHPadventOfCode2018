<?php

namespace Puzzles\Day16;

class PuzzlePartOne extends Puzzle
{
    private $sum = 0;

    public function processInput()
    {
        $dancers = 'abcdefghijklmnop';

        $input = $this->input[0];
        $instructions = explode(',', $input);

        foreach ($instructions as $instruction) {
            $type = $instruction[0];
            $moves = substr($instruction, 1);

            switch ($type) {
                case 's':
                    $dancers = substr($dancers, -1 * $moves) . substr($dancers, 0, strlen($dancers) - $moves);
                    break;
                case 'x':
                    $moves = explode('/', $moves);
                    $tmp = $dancers[$moves[0]];
                    $dancers[$moves[0]] = $dancers[$moves[1]];
                    $dancers[$moves[1]] = $tmp;
                    break;
                case 'p':
                    $moves = explode('/', $moves);
                    $dancers = str_replace($moves[0], '0', $dancers);
                    $dancers = str_replace($moves[1], $moves[0], $dancers);
                    $dancers = str_replace('0', $moves[1], $dancers);
                    break;
            }
        }

        $this->solution1 = $dancers;
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->solution1 . PHP_EOL;
    }
}
