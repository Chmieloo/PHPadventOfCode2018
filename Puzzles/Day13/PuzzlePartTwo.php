<?php

namespace Puzzles\Day12;

class PuzzlePartTwo extends Puzzle
{
    private $graphData = [];
    private $visited = [];
    private $allVisited = [];

    public function processInput()
    {
        foreach ($this->input as $line) {
            $data = explode('<->', $line);
            $connections = array_map('trim', explode(',', $data[1]));
            $this->graphData[trim($data[0])] = $connections;
        }

        $allVisited = [];
        $x = 0;
        foreach ($this->graphData as $key => $connected) {
            if (!in_array($key, $allVisited)) {
                $x++;
            }
            $this->visited = [];
            $visits = $this->dfs($key);
            $allVisited = array_unique(array_merge($allVisited, $visits));
        }

        $this->solution2 = $x;
    }

    /**
     * @param $nodeKey
     * @return array
     */
    protected function dfs($nodeKey)
    {
        $nodeData = $this->graphData[$nodeKey];
        foreach ($nodeData as $node) {
            if (!in_array($node, $this->visited)) {
                $this->visited[] = $node;
                $this->allVisited[$nodeKey][] = $node;
                $this->dfs($node);
            }
        }
        return $this->visited;
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->solution2 . PHP_EOL;
    }
}
