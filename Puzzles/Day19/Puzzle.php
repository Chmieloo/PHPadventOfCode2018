<?php

namespace Puzzles\Day19;

use Puzzles\Abstraction\Puzzle as PuzzleAbstract;

/**
 * Puzzle day 19
 * Common class for day 19
 * Advent Of Code 2017
 */
class Puzzle extends PuzzleAbstract
{
    protected $runTime;
    protected $solution1;
    protected $solution2;

    private $map = [];
    private $direction = 'd';

    private $posX = 0;
    private $posY = 153;
    private $moves = 0;

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
        foreach ($this->input as $line) {
            $row = str_split(rtrim($line));
            $this->map[] = $row;
        }

        do {
            $this->move();
            $this->moves++;
        } while (strlen($this->solution1) != 10);
        $this->moves++;
        $this->solution2 = $this->moves;
    }

    private function move()
    {
        switch ($this->direction) {
            case 'd':
                $this->posX++;
                $char = $this->map[$this->posX][$this->posY];
                if (ctype_alnum($char)) {
                    $this->solution1 .= $char;
                } elseif ($char == '+') {
                    $this->changeDirection();
                }
                break;
            case 'l':
                $this->posY--;
                $char = $this->map[$this->posX][$this->posY];
                if (ctype_alnum($char)) {
                    $this->solution1 .= $char;
                } elseif ($char == '+') {
                    $this->changeDirection();
                }
                break;
            case 'r':
                $this->posY++;
                $char = $this->map[$this->posX][$this->posY];
                if (ctype_alnum($char)) {
                    $this->solution1 .= $char;
                } elseif ($char == '+') {
                    $this->changeDirection();
                }
                break;
            case 'u':
                $this->posX--;
                $char = $this->map[$this->posX][$this->posY];
                if (ctype_alnum($char)) {
                    $this->solution1 .= $char;
                } elseif ($char == '+') {
                    $this->changeDirection();
                }
                break;
        }
    }

    private function changeDirection()
    {
        $from = $this->direction;
        # Check which one is connected
        if (isset($this->map[$this->posX-1][$this->posY]) && $this->map[$this->posX-1][$this->posY] == '|') {
            if ($from == 'l' || $from == 'r') {
                $this->direction = 'u';
                return;
            }
        }

        if (isset($this->map[$this->posX+1][$this->posY]) && $this->map[$this->posX+1][$this->posY] == '|') {
            if ($from == 'l' || $from == 'r') {
                $this->direction = 'd';
                return;
            }
        }

        if (isset($this->map[$this->posX][$this->posY-1]) && $this->map[$this->posX][$this->posY-1] == '-') {
            if ($from == 'u' || $from == 'd') {
                $this->direction = 'l';
                return;
            }
        }

        if (isset($this->map[$this->posX][$this->posY+1]) && $this->map[$this->posX][$this->posY+1] == '-') {
            if ($from == 'u' || $from == 'd') {
                $this->direction = 'r';
                return;
            }
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
