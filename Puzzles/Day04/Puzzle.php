<?php

namespace Puzzles\Day04;

use Puzzles\Abstraction\Puzzle as PuzzleAbstract;

/**
 * Puzzle day 4
 * Common class for day 4
 * Advent Of Code 2017
 */
class Puzzle extends PuzzleAbstract
{
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
