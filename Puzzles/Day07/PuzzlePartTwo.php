<?php

namespace Puzzles\Day07;

class PuzzlePartTwo extends Puzzle
{
    private $solution = 0;
    private $weights = [];

    public function processInput()
    {
        $array = [];
        foreach ($this->input as $line) {
            $parts = preg_split('/\s+/', $line);
            $array[$parts[0]] = [];
            $weights[$parts[0]] = str_replace(['(', ')'], '', $parts[1]);
            $parts = array_filter($parts);

            if (count($parts) > 2 && $parts[2] == '->') {
                for ($i = 3; $i < count($parts); $i++) {
                    $string = trim($parts[$i], ",");
                    $array[$parts[0]][] = $string;
                }
            }
        }

        $this->weights = $weights;

        $co = [];
        $childrenOnly = array_values(array_filter($array));
        foreach ($childrenOnly as $childrenArray) {
            $co = array_merge($co, $childrenArray);
        }
        $diff = array_diff(array_keys($array), $co);

        //var_dump($diff);

        $newArray = array_filter($array);

        foreach ($newArray as $parent => $children) {
            $newArray[$parent] = array_flip($children);
        }

        foreach ($newArray as $parent => $children) {
            foreach ($children as $child => $val) {
                $newArray[$parent][$child] = $this->weights[$child] . ': ' . $this->getChildrenWeights($newArray, $child);
            }
        }


        var_dump($newArray);

    }

    private function getChildrenWeights($array, $node)
    {
        $sum = 0;

        if (array_key_exists($node, $array)) {
            foreach ($array[$node] as $key => $item) {
                $sum += $this->weights[$key];
            }
            $sum += $this->weights[$node];
        }

        return $sum;
    }


    private function isBalanced($node)
    {
        # If this is children node, get the weight

        # If parent, get
        if ($hasChildren) {
            foreach ($array[$node] as $children) {
                return $this->isBalanced();
            }
        }
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->solution . PHP_EOL;
    }
}
