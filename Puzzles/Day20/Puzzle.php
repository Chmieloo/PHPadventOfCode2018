<?php

namespace Puzzles\Day20;

use Puzzles\Abstraction\Puzzle as PuzzleAbstract;

/**
 * Puzzle day 20
 * Common class for day 20
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
     * @return null
     */
    public function renderSolution()
    {
        return null;
    }
}
