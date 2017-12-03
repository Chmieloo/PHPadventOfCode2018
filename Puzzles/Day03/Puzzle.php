<?php

namespace Puzzles\Day03;

use Puzzles\Abstraction\Puzzle as PuzzleAbstract;

/**
 * Puzzle day 3
 * Common class for day 3
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
        $this->input = 312051;
    }

    /**
     * @return null
     */
    public function renderSolution()
    {
        return null;
    }
}
