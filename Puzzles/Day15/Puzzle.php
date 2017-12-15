<?php

namespace Puzzles\Day15;

use Puzzles\Abstraction\Puzzle as PuzzleAbstract;

/**
 * Puzzle day 15
 * Common class for day 15
 * Advent Of Code 2017
 */
class Puzzle extends PuzzleAbstract
{
    protected $runTime;
    protected $solution1;
    protected $solution2;

    public function __construct()
    {
        $this->processInput();
    }

    protected function loadInput()
    {
        // TODO: Implement loadInput() method.
    }

    /**
     * @return null
     */
    public function renderSolution()
    {
        return null;
    }
}
