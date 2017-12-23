<?php

namespace Puzzles\Day18;

class PuzzlePartOne extends Puzzle
{
    private $registers = [
        'a' => 0,
        'b' => 0,
        'f' => 0,
        'i' => 0,
        'p' => 0,
    ];

    private $sound = null;

    private $instructions = [];

    public function processInput()
    {
        $this->solution2 = 0;

        foreach ($this->input as $line) {
            $data = explode(' ', trim($line));
            $this->instructions[] = [
                'cmd' => $data[0],
                'from' => $data[1],
                'to' => isset($data[2]) ? $data[2] : 0,
            ];
        }

        $pointer = 0;

        //for ($i = 0; $i < 25; $i++) {
        while (1) {
            $cmd = $this->instructions[$pointer]['cmd'];
            $from = $this->instructions[$pointer]['from'];
            $to = $this->instructions[$pointer]['to'];

            echo $cmd . ': ' . $from . ' ' . $to . PHP_EOL;
            switch ($cmd) {
                case 'snd':
                    $this->sound = $this->registers[$from];
                    break;
                case 'set':
                    $this->registers[$from] = ctype_alpha($to) ? $this->registers[$to] : (int)$to;
                    break;
                case 'add':
                    $this->registers[$from] += ctype_alpha($to) ? $this->registers[$to] : (int)$to;
                    break;
                case 'mul':
                    $this->registers[$from] *= ctype_alpha($to) ? $this->registers[$to] : (int)$to;
                    break;
                case 'mod':
                    $this->registers[$from] %= ctype_alpha($to) ? $this->registers[$to] : (int)$to;
                    break;
                case 'jgz':
                    $check = ctype_alpha($from) ? $this->registers[$from] : $from;
                    $skip = ctype_alpha($to) ? $this->registers[$to] : $to;
                    if ($check > 0) {
                        $pointer += $skip;
                        $pointer--;
                    }
                    break;
                case 'rcv':
                    $this->solution1 = $this->sound;
                    break 2;
            }
            $pointer++;
            var_dump($this->registers);
        }
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->solution1 . PHP_EOL;
    }
}
