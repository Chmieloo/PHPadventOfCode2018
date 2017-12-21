<?php

namespace Puzzles\Day18;

class PuzzlePartOne extends Puzzle
{
    private $registers = [];
    private $lastPlayed = [];
    private $lastValue = 0;
    private $key = 0;

    public function processInput()
    {
        foreach ($this->input as $item) {
            $data = explode(' ', trim($item));
            $register = $data[1];
            $this->registers[$register] = 0;
            $this->lastPlayed[$register] = 0;
        }

        //foreach ($this->input as $key => $item) {
        while (1) {
        //for ($i = 0; $i < 15; $i++) {
            $item = $this->input[$this->key];
            $data = explode(' ', trim($item));
            $instruction = $data[0];
            echo 'Running instruction ' . $this->key . ': ' . $item . PHP_EOL;
            $x = $data[1];
            if (count($data) == 3) {
                switch ($instruction) {
                    case 'set':
                        $this->registers[$x] = is_numeric($data[2]) ? $data[2] : $this->registers[$data[2]];
                        $this->key++;
                        break;
                    case 'mul':
                        $this->registers[$x] *= is_numeric($data[2]) ? $data[2] : $this->registers[$data[2]];
                        $this->key++;
                        break;
                    case 'add':
                        $this->registers[$x] += is_numeric($data[2]) ? $data[2] : $this->registers[$data[2]];
                        $this->key++;
                        break;
                    case 'mod':
                        $this->registers[$x]
                            = is_numeric($data[2]) ? $this->registers[$x] % $data[2] :
                            $this->registers[$x] % $this->registers[$data[2]];
                        $this->key++;
                        break;
                    case 'jgz':
                        if ($this->registers[$x] > 0) {
                            $this->key += is_numeric($data[2]) ? $data[2] : $this->registers[$data[2]];
                        } else {
                            $this->key++;
                        }
                        break;
                }
            } else {
                switch ($instruction) {
                    case 'snd':
                        $this->lastPlayed[$x] = $this->registers[$x];
                        $this->lastValue = $this->registers[$x];
                        $this->key++;
                        break;
                    case 'rcv':
                        if ($this->registers[$x] == 0) {
                            $this->key++;
                        } else {
                            $this->solution1 = $this->lastPlayed[$x];
                            break 2;
                        }
                        break;
                }
            }
            var_dump($this->registers);
        }
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->solution1 . PHP_EOL;
    }
}
