<?php

namespace Puzzles\Day12;

class PuzzlePartOne extends Puzzle
{
    private $visited = [];
    private $graphData = [];

    public function processInput()
    {
        foreach ($this->input as $line) {
            $data = explode('<->', $line);
            $connections = array_map('trim', explode(',', $data[1]));
            $this->graphData[trim($data[0])] = $connections;
        }
        $this->dfs(0);
        $this->solution1 = count($this->visited);
    }

    /**
     * @param $nodeKey
     */
    private function dfs($nodeKey)
    {
        $nodeData = $this->graphData[$nodeKey];
        foreach ($nodeData as $node) {
            if (!in_array($node, $this->visited)) {
                $this->visited[] = $node;
                $this->dfs($node);
            }
        }
    }

    public function renderSolution()
    {
        echo 'Solution: ' . $this->solution1 . PHP_EOL;
    }
}


