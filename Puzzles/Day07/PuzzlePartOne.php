<?php

namespace Puzzles\Day07;

class PuzzlePartOne extends Puzzle
{
    private $sum = 0;
    private $tree = null;

    function createTree(&$list, $parent){
        $tree = array();
        foreach ($parent as $k => $l){
            if(isset($list[$l['id']])){
                $l['children'] = $this->createTree($list, $list[$l['id']]);
            }
            $tree[] = $l;
        } 
        return $tree;
    }

    function parseTree($tree){
        $a = array();
        foreach ($tree as $item){
            if (!isset($a[$item['name']])){
                // add child to array of all elements
                $a[$item['name']] = array();
            }
            if (!isset($a[$item['parent']])){
                // add parent to array of all elements
                $a[$item['parent']] = array();
    
                // add reference to master list of parents
                $p[$item['parent']] = &$a[$item['parent']];
            }
            if (!isset($a[$item['parent']][$item['name']])){
                // add reference to child for this parent
                $a[$item['parent']][$item['name']] = &$a[$item['name']];
            }   
        }
        return $p;
    }
    
    private $waits = [];

    public function processInput()
    {
        foreach ($this->input as $line) {
            $line = trim($line);
            
            # add to tree
            $line = explode(" ", $line);
            $letter1 = $line[1];
            $letter2 = $line[7];

            $arr[] = [
                'parent' => $letter1,
                'name' => $letter2,
            ];

            if (array_key_exists($letter2, $this->waits)) {
                $this->waits[$letter2] .= $letter1;
            } else {
                $this->waits[$letter2] = $letter1;
            }
        }

        print_r($this->waits);

        print_r($arr);
        $tree = $this->parseTree($arr);
        print_r($tree);

        //$tree = $this->createTree($new1, array(current($new1)));

        //print_r($tree);

        /*
        for ($i=0;$i<=$maxX;$i++) {
            for ($j=0;$j<=$maxY;$j++) {
                $distanceToClosestPoint = 1000000;
                $closestIndex = '.';
                foreach ($this->coords as $index => $point) {
                    $pointX = $point[0];
                    $pointY = $point[1];

                    $currentDistance = $this->getDistance($i, $j, $pointX, $pointY);
                    if ($currentDistance < $distanceToClosestPoint) {
                        $distanceToClosestPoint = $currentDistance;
                        $closestIndex = $index;
                    } elseif ($currentDistance == $distanceToClosestPoint) {
                        // if we have two points in the same distance, it is a "."
                        $closestIndex = '.';
                    }
                }

                $this->view[$i][$j] = $closestIndex;
                $this->indexCount[$closestIndex]++;
            }
        }

        for ($i=0;$i<=$maxX;$i++) {
            $index = $this->view[$i][0];
            unset($this->indexCount[$index]);
            $index = $this->view[$i][$maxY];
            unset($this->indexCount[$index]);
        }

        for ($i=0;$i<=$maxY;$i++) {
            $index = $this->view[0][$i];
            unset($this->indexCount[$index]);
            $index = $this->view[$maxX][$i];
            unset($this->indexCount[$index]);
        }

        arsort($this->indexCount);

        $this->sum = array_shift($this->indexCount);
        */
    }


    public function renderSolution()
    {
        echo 'Solution: ' . $this->sum . PHP_EOL;
    }
}
