<?php

namespace Puzzles\Day09;

class PuzzlePartOne extends Puzzle
{
    private $sum = 0;
    private $numPlayers = 452;
    private $marbles = [0];

    public function processInput()
    {
        $players = [];
        $numMarbles = 7078400;

        $index = 0;

        for ($i = 1; $i <= $numMarbles; $i++) {
            $playerNumber = ($i % $this->numPlayers) ? : $this->numPlayers;
            if ($i % 23 == 0) {
                $players[$playerNumber] += $i;
                if ($index - 7 < 0) {
                    $subs = $index - 7;
                    $players[$playerNumber] += array_splice($this->marbles, count($this->marbles) + $subs, 1)[0];
                    $index = count($this->marbles) + $subs + 1;
                } else {
                    $players[$playerNumber] += array_splice($this->marbles, $index - 7, 1)[0];
                    $index = $index - 7;
                }
            } else {
                # if index in advance does not exist, reset it to 0
                $index++;
                if (!array_key_exists($index, $this->marbles)) {
                    $index = 0;
                    array_splice($this->marbles, ++$index, 0, [$i]);
                } else {
                    $index++;
                    array_splice($this->marbles, $index, 0, [$i]);
                }
            }

            if ($i % 1000 == 0) {
                echo $i . PHP_EOL;
            }
            //echo $playerNumber . ': ' . join(" ", $this->marbles) . PHP_EOL;// . ' current: ' . $index . PHP_EOL;
        }

        asort($players);
        print_r($players);
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->sum . PHP_EOL;
    }
}