<?php

namespace Puzzles\Day16;

class PuzzlePartTwo extends Puzzle
{
    public function processInput()
    {
        $dancers = $init = 'abcdefghijklmnop';

        $input = $this->input[0];
        $instructions = explode(',', $input);
        $dances = [];

        do {
            $dances[] = $dancers;
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
        } while ($dancers != $init);

        $this->solution2 = $dances[1000000000 % count($dances)];
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->solution2 . PHP_EOL;
    }
}
