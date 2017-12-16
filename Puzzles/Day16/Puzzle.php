<?php

namespace Puzzles\Day16;

use Puzzles\Abstraction\Puzzle as PuzzleAbstract;

/**
 * Puzzle day 16
 * Common class for day 16
 * Advent Of Code 2017
 */
class Puzzle extends PuzzleAbstract
{
    protected $runTime;
    protected $solution1;
    protected $solution2;

    protected $dancers = 'abcdefghijklmnop';

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
