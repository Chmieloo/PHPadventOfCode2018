<?php

namespace Puzzles\Day04;

class PuzzlePartOne extends Puzzle
{
    private $currentGuard = 0;
    private $schedule = [];
    private $guards = [];
    private $maxForGuards = [];
    private $sum = 0;

    public function processInput()
    {
        usort($this->input, [$this, "dateSort"]);

        foreach ($this->input as $line) {
            $this->parseLine($line);
        }

        foreach ($this->schedule as $date => $data) {
            foreach ($data as $guard => $shift) {
                //echo $date . ' ' . $guard . "\t" . join("", $shift) . PHP_EOL;
            }
        }

        $guards = array_flip(array_unique($this->guards));
        $numGuards = count($guards);
        $tst = [];
        $arr = [];

        //$guards = array_combine(array_keys($guards), array_fill(0, $numGuards, 0));

        foreach ($this->schedule as $date => $data) {
            foreach ($data as $guard => $shift) {
                for ($i = 0; $i < 60; $i++) {
                    if ($shift[$i] == "#") {
                        $arr[$guard][$i]++;
                        $tst[$guard]++;
                    }
                }
            }
        }



        foreach ($arr as $guard => &$minutes) {
            arsort($minutes);
        }
        print_r($arr);

        foreach ($arr as $guard => &$minutes) {
            $maxMinutes = 0;
            arsort($minutes);

            if ($minutes[0] >= $maxMinutes) {
                $key = key($minutes);
                $x = $key * $guard;
                echo $key . ' ' . $guard . ' = ' . $x . PHP_EOL;
                //$this->sum = $key * $guard;
            }
        }
    }

    private function parseLine($line)
    {
        $line = trim($line);
        $line = str_replace(["[", "]"], "", $line);

        $line = explode(" ", $line);
        $date = $line[0];
        $time = $line[1];

        if ($line[2] == "Guard") {
            $this->currentGuard = trim($line[3], "#");
            $this->schedule[$date][$this->currentGuard] = array_fill(0, 60, ".");
            $this->guards[] = $this->currentGuard;
        } elseif ($line[2] == "falls") {
            if (!array_key_exists($this->currentGuard, $this->schedule[$date])) {
                $this->schedule[$date][$this->currentGuard] = array_fill(0, 60, ".");
            }

            $parseTime = explode(":", $time);
            $minute = (int) $parseTime[1];

            for($i = $minute; $i < 60; $i++) {
                $this->schedule[$date][$this->currentGuard][$i] = "#";
            }
        } elseif ($line[2] == "wakes") {
            if (!array_key_exists($this->currentGuard, $this->schedule[$date])) {
                $this->schedule[$date][$this->currentGuard] = array_fill(0, 60, ".");
            }
            $parseTime = explode(":", $time);
            $minute = (int) $parseTime[1];

            for($i = $minute; $i < 60; $i++) {
                $this->schedule[$date][$this->currentGuard][$i] = ".";
            }
        }
    }

    private static function dateSort($a, $b) {
        $x = trim($a);
        $y = trim($b);
        $x = explode("]", $x);
        $y = explode("]", $y);
        $a = trim($x[0], "[]");
        $b = trim($y[0], "[]");
        
        return strtotime($a) - strtotime($b);
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->sum . PHP_EOL;
    }
}
