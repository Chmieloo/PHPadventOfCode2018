<?php

namespace Puzzles\Day08;

use Puzzles\Abstraction\Puzzle as PuzzleAbstract;

/**
 * Puzzle day 8
 * Common class for day 8
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

    public function processInput()
    {
        $registers = [];
        $cond = [];

        foreach ($this->input as $line) {
            $instructions = explode('if', $line);
            $command = trim($instructions[0]);
            $condition = trim($instructions[1]);

            $comm[] = $command;
            $cond[] = $condition;

            $part1 = $parts = preg_split('/\s+/', $command);
            $register = trim($part1[0]);
            $registers[$register] = 0;
        }

        foreach ($cond as $key => $c) {
            $cond = preg_split('/\s+/', $c);
            $reg1 = trim($cond[0]);
            $comp = trim($cond[1]);
            $reg2 = trim($cond[2]);

            if ($this->checkCondition($registers, $reg1, $reg2, $comp)) {
                $registers = $this->modifyRegisters($comm[$key], $registers);
            }
        }

        $this->solution1 = max($registers);
    }

    /**
     * @param $instruction
     * @param $registers
     * @return mixed
     */
    protected function modifyRegisters($instruction, $registers)
    {
        $ins = preg_split('/\s+/', $instruction);
        $reg = trim($ins[0]);
        $mod = trim($ins[1]);
        $num = trim($ins[2]);

        if ($mod == 'inc') {
            $registers[$reg] += $num;
        } else {
            $registers[$reg] -= $num;
        }

        if (max($registers) >= $this->solution2) {
            $this->solution2 = max($registers);
        }

        return $registers;
    }

    /**
     * @param $registers
     * @param $reg1
     * @param $reg2
     * @param $comp
     * @return bool
     */
    protected function checkCondition($registers, $reg1, $reg2, $comp)
    {
        switch ($comp) {
            case '<':
                return ($registers[$reg1] < $reg2);
                break;
            case '<=':
                return ($registers[$reg1] <= $reg2);
                break;
            case '>':
                return ($registers[$reg1] > $reg2);
                break;
            case '>=':
                return ($registers[$reg1] >= $reg2);
                break;
            case '==':
                return ($registers[$reg1] == $reg2);
                break;
            case '!=':
                return ($registers[$reg1] != $reg2);
                break;
        }
    }

    /**
     * @return null
     */
    public function renderSolution()
    {
        return null;
    }
}
