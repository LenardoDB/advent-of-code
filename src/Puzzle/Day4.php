<?php

namespace AOC\Puzzle;

use AOC\Helper\PuzzleHelper;

class Day4 extends PuzzleHelper
{
    public function stepOne()
    {
        $cards = $this->game();
        $answer = 0;

        foreach($cards as $card) {
            $points = 0;
            $winningNumbers = $this->getWinningNumbers($card);

            array_map(function() use (&$points) {
                if( $points == 0) {
                    $points = 1;
                } else {
                    $points *= 2;
                }
            }, $winningNumbers);

            $answer += $points;
        }

        $this->answer('one', $answer);
    }

    public function stepTwo()
    {
        $cards = $this->game();
        $scratchCards = [];
        $counter = 1;

        foreach($cards as $card) {

            if (!isset($scratchCards[$counter])) {
                $scratchCards[$counter] = 0;
            }

            $scratchCards[$counter] += 1;

            $winningNumbers = $this->getWinningNumbers($card);

            $cardWin = 1;

            if (isset($scratchCards[$counter])) {
                $cardWin = $scratchCards[$counter];
            }

            for($i = 1; $i <= count($winningNumbers); $i++) {
                if (!isset($scratchCards[$i + $counter])) {
                    $scratchCards[$i + $counter] = 0;
                }

                $scratchCards[$i + $counter] += $cardWin;
            }

            $counter++;
        }
        
        $this->answer('two', array_sum($scratchCards));
    }

    private function getWinningNumbers(string $card): array
    {
        $winningNumbers = [];
        $cardData = explode(':', $card);
        $cardDataNumbers = explode('|', $cardData[1]);
        
        preg_match_all('/\d+/', $cardDataNumbers[0], $matches);
        $cardNumbers = $matches[0];

        preg_match_all('/\d+/', $cardDataNumbers[1], $matches);
        $cardWinningNumbers = $matches[0];

        foreach($cardNumbers as $number) {
            if(in_array($number, $cardWinningNumbers)) {
                $winningNumbers[] = (int)$number;
            }
        }

        return $winningNumbers;
    }
}
