<?php

namespace Puzzles\Day21;

class PuzzlePartOne extends Puzzle
{
    private $keys = [];
    private $rules = [];

    private $pattern = '.#...####';

    public function processInput()
    {
        foreach ($this->input as $line) {
            preg_match(
                '/(.*?)\s=>\s(.*)/',
                $line,
                $matches
                );

            $this->rules[$matches[1]] = $matches[2];

        }

        for ($i = 0; $i < 5; $i++) {
            $squareLength = sqrt(strlen($this->pattern));

            if ($squareLength % 2 == 0) {
                $squares = $this->getSquares(2);
                $size = 2;
            } elseif ($squareLength % 3 == 0) {
                $squares = $this->getSquares(3);
                $size = 3;
            }

            $this->pattern = '';

            $row = 0;
            $p = [];
            foreach ($squares as $squareNum => $square) {
                $keys = $this->getSquareVariations($square);
                foreach ($keys as $key) {
                    if (in_array($key, array_keys($this->rules))) {
                        $splitSquare = explode('/', $this->rules[$key]);
                        break;
                    }
                }

                foreach ($splitSquare as $rowNum => $splitSquareRow) {
                    if (array_key_exists($row + $rowNum, $p)) {
                        $p[$row + $rowNum] .= $splitSquareRow;
                    } else {
                        $p[$row + $rowNum] = $splitSquareRow;
                    }
                }

                if (($squareNum + 1) % ($squareLength / $size) == 0) {
                    $row += 3;
                }
            }

            $this->pattern = join('', $p);

            $this->showPattern();
            echo PHP_EOL;
        }

        $this->solution1 = substr_count($this->pattern, '#');
    }

    private function getSquareVariations($square)
    {
        $keys = [];

        # Original
        $slashSquare = $this->normalizeSquare($square);
        $keys[] = $slashSquare;

        # R1
        $square = $this->rotateR($square);
        $slashSquare = $this->normalizeSquare($square);
        $keys[] = $slashSquare;

        # R2
        $square = $this->rotateR($square);
        $slashSquare = $this->normalizeSquare($square);
        $keys[] = $slashSquare;

        # R3
        $square = $this->rotateR($square);
        $slashSquare = $this->normalizeSquare($square);
        $keys[] = $slashSquare;

        # Back to original and flip
        $square = $this->rotateR($square);
        $square = $this->flip($square);
        $slashSquare = $this->normalizeSquare($square);
        $keys[] = $slashSquare;

        # R1
        $square = $this->rotateR($square);
        $slashSquare = $this->normalizeSquare($square);
        $keys[] = $slashSquare;

        # R2
        $square = $this->rotateR($square);
        $slashSquare = $this->normalizeSquare($square);
        $keys[] = $slashSquare;

        # R3
        $square = $this->rotateR($square);
        $slashSquare = $this->normalizeSquare($square);
        $keys[] = $slashSquare;

        return $keys;
    }

    private function normalizeSquare($squareString)
    {
        $slashSquare = '';
        if (strlen($squareString) % 2 == 0) {
            $slashSquare = substr_replace($squareString, '/', 2, 0);
        } elseif (strlen($squareString) % 3 == 0) {
            $slashSquare = substr_replace($squareString, '/', 3, 0);
            $slashSquare = substr_replace($slashSquare, '/', 7, 0);
        }

        return $slashSquare;
    }

    private function getSquares($size)
    {
        $tmp = str_split($this->pattern, sqrt(strlen($this->pattern)));
        $squares = [];
        $patternLength = strlen($this->pattern);
        $edgeLength = sqrt($patternLength);
        $numEdgeSquares = $edgeLength / $size;
        for ($i = 0; $i < $numEdgeSquares; $i++) {
            for ($j = 0; $j < $numEdgeSquares; $j++) {
                if ($size == 2) {
                    $sqr =
                        substr($tmp[$i * $size], $j * $size, $size) .
                        substr($tmp[$i * $size + 1], $j * $size, $size);
                } elseif ($size == 3) {
                    $sqr =
                        substr($this->pattern, $i * $size, $size) .
                        substr($this->pattern, $i * $size + $edgeLength, $size) .
                        substr($this->pattern, $i * $size + 2 * $edgeLength, $size);
                }
                $squares[] = $sqr;
            }
        }

        return $squares;
    }

    private function rotateR($string)
    {
        if (strlen($string) % 3 == 0) {
            return
                $string[6] . $string[3] . $string[0] .
                $string[7] . $string[4] . $string[1] .
                $string[8] . $string[5] . $string[2];
        } elseif (strlen($string) % 2 == 0) {
            return
                $string[2] . $string[0] . $string[3] . $string[1];
        }
    }

    private function rotateL($string)
    {
        if (strlen($string) % 3 == 0) {
            return
                $string[2] . $string[5] . $string[8] .
                $string[1] . $string[4] . $string[7] .
                $string[0] . $string[3] . $string[6];
        } elseif (strlen($string) % 2 == 0) {
            return
                $string[1] . $string[3] . $string[0] . $string[2];
        }
    }

    private function flip($string)
    {
        if (strlen($string) % 3 == 0) {
            return
                $string[2] . $string[1] . $string[0] .
                $string[5] . $string[4] . $string[3] .
                $string[8] . $string[7] . $string[6];
        } elseif (strlen($string) % 2 == 0) {
            return
                $string[1] . $string[0] . $string[3] . $string[2];
        }
    }

    private function showPattern()
    {
        $len = strlen($this->pattern);
        $edgeLength = sqrt($len);
        for ($i = 1; $i <= $len; $i++) {
            echo $this->pattern[$i-1];
            if ($i % $edgeLength == 0) {
                echo PHP_EOL;
            }
        }
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->solution1 . PHP_EOL;
    }
}
