<?php

namespace AOC\Puzzle;

use AOC\Helper\PuzzleHelper;

class Day5 extends PuzzleHelper
{
    private array $seeds = [];
    private array $ranges = [];

    protected function initialize(): void
    {
        [$this->seeds, $this->ranges] = $this->parse($this->game(false));
    }

    public function stepOne()
    {
        foreach( $this->seeds as $seed) {
            // dd($seed);
            foreach($this->ranges as $map){
                foreach($map as $range) {
                    dd($range);
                }
            }
        }
    }

    public function stepTwo()
    {
        
    }

    private function parse($data): array
    {
        $parsed = ['seeds' => [], 'ranges' => []];

        foreach (explode("\n\n", $data) as $i => $bloc) {
            if (0 === $i) {
                preg_match('/seeds:(?P<seeds>.*)/', $bloc, $matches);
                $parsed['seeds'] = explode(' ', trim($matches['seeds']));
                continue;
            }

            $ranges = [];
            foreach (explode("\n", $bloc) as $j => $map) {
                if (0 === $j) {
                    continue;
                }

                $range = explode(' ', $map);
                $ranges[] = $range;
            }
            $parsed['ranges'][] = $ranges;
        }

        return [$parsed['seeds'], $parsed['ranges']];
    }
}
