<?php

namespace Puzzles\Day11;

use Puzzles\Abstraction\Puzzle as PuzzleAbstract;

/**
 * Puzzle day 10
 * Common class for day 10
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
        $x = 0;
        $y = 0;
        $z = 0;
        $instructions = explode(",", $this->input[0]);

        $distances = [];

        foreach ($instructions as $instruction) {
            switch ($instruction) {
                case 'n':
                    $y++;
                    $z--;
                    break;
                case 'ne':
                    $x++;
                    $z--;
                    break;
                case 'nw':
                    $x--;
                    $y++;
                    break;
                case 's':
                    $y--;
                    $z++;
                    break;
                case 'se':
                    $x++;
                    $y--;
                    break;
                case 'sw':
                    $x--;
                    $z++;
                    break;
            }
            $distances[] = (abs($x) + abs($y) + abs($z)) / 2;
        }

        $this->solution1 = (abs($x) + abs($y) + abs($z)) / 2;
        $this->solution2 = max($distances);
    }


    /**
     * @return null
     */
    public function renderSolution()
    {
        return null;
    }
}
