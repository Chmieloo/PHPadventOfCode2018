<?php

namespace Puzzles\Day23;

class PuzzlePartOne extends Puzzle
{
    private $registers = [
        'a' => 1,
        'b' => 0,
        'c' => 0,
        'd' => 0,
        'e' => 0,
        'f' => 0,
        'g' => 0,
        'h' => 0,
    ];

    private $instructions = [];

    public function processInput()
    {
        $this->solution1 = 0;

        foreach ($this->input as $line) {
            $data = explode(' ', trim($line));
            $this->instructions[] = [
                'cmd' => $data[0],
                'from' => $data[1],
                'to' => $data[2],
            ];
        }

        $pointer = 0;

        //for ($i = 0; $i < 10; $i++) {
        while ($pointer < count($this->instructions)) {
            $cmd = $this->instructions[$pointer]['cmd'];
            $from = $this->instructions[$pointer]['from'];
            $to = $this->instructions[$pointer]['to'];

            //echo $cmd . ' ' . $from . ' ' . $to . PHP_EOL;

            switch ($cmd) {
                case 'set':
                    $this->registers[$from] = is_numeric($to) ? $to : $this->registers[$to];
                    break;
                case 'sub':
                    $this->registers[$from] -= is_numeric($to) ? $to : $this->registers[$to];
                    break;
                case 'mul':
                    $this->registers[$from] *= is_numeric($to) ? $to : $this->registers[$to];
                    $this->solution1++;
                    break;
                case 'jnz':
                    $check = is_numeric($from) ? $from : $this->registers[$from];
                    $skip = is_numeric($to) ? $to : $this->registers[$to];
                    if ($check != 0) {
                        $pointer += $skip;
                        $pointer--;
                    }
                    break;
            }
            $pointer++;

            //var_dump($this->registers);
        }

        var_dump($this->registers['h']);
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->solution1 . PHP_EOL;
    }
}
