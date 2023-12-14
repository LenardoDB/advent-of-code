<?php

namespace AOC\Puzzle;

use AOC\Helper\PuzzleHelper;

class Day3 extends PuzzleHelper
{
    public function stepOne()
    {
        $lines = $this->game();
        $answer = 0;
        $machineNumbers = [];

        foreach ($lines as $idx => $line) {
            preg_match_all('/\d+/', $line, $matches);
            $matches = $matches[0];
            $numbers = [];

            $parsedLine = $line;

            foreach ($matches as $match) {
                $replaceString = str_repeat('?', strlen($match));
                $position = strpos($parsedLine, $match);

                $parsedLine = substr_replace($parsedLine, $replaceString, $position, strlen($match));

                $numbers[] = [$idx, $position, $match];
            }

            $lines[$idx] = $parsedLine;

            foreach($numbers as $numberData) {
                $line = $numberData[0];
                $position = $numberData[1];
                $number = (int)$numberData[2];
                $length = strlen($number);

                for($i = -1; $i <= $length; $i++) {
                    $characters = [];

                    // Find all characters above the current number
                    if($line - 1 >= 0 && $position + $i >= 0 && $position + $i < strlen($lines[0])) {
                        $characters[] = $lines[$line -1][$position + $i];
                    }

                    // Find all characters below the current number
                    if($line + 1 < count($lines) && $position + $i >= 0 && $position + $i < strlen($lines[0])) {
                        $characters[] = $lines[$line +1][$position + $i];
                    }
                    
                    if($position + $i >= 0 && $position + $i < strlen($lines[0])) {
                        $characters[] = $lines[$line][$position + $i];
                    }

                    $hasSymbols = array_filter($characters, function($character) {
                        return !is_numeric($character) && $character !== '.' && $character !== '?';
                    });

                    if(!empty($hasSymbols)) {
                        $answer += $number;
                        $machineNumbers[] = $number;
                        break;
                    }
                }
            }
        }

        $this->answer('one', $answer);
    }

    public function stepTwo()
    {
        $lines = $this->game();
        $answer = 0;

        foreach($lines as $id => $line) {
            preg_match_all('/\*/', $line, $matches);
            $matches = $matches[0];
            $gears = [];

            $parsedLine = $line;

            foreach($matches as $match) {
                // Replace all * with ? to prevent them from being matched again
                $replaceString = str_repeat('?', strlen($match));
                $position = strpos($parsedLine, $match);
                $parsedLine = substr_replace($parsedLine, $replaceString, $position, strlen($match));

                // Store the gear data
                $gears[] = [$id, $position];
            }

            foreach($gears as $gear) {
                $line = $gear[0];
                $position = $gear[1];
                $numbers = [];

                // Find digit above the gear
                if($line - 1 >= 0 && $position >= 0 && $position < strlen($lines[0])) {
                    // Loop over the 3 characters above the gear
                    for($i = $position -1; $i <= $position + 1; $i++) {
                        $number = 0;
                        // Check if the character is a digit
                        if(is_numeric($lines[$line -1][$i])) {
                            // $foundNumber = $lines[$line -1][$i];

                            // // Check if the character before the digit is a digit
                            // $isBefore = is_numeric($lines[$line -1][$i -1]);

                            // if($isBefore) {
                            //     $partBefore = substr($lines[$line -1], $i -2, 3);
                            //     preg_match('/\d+/', $partBefore, $matches);
                            //     $number = (int) $matches[0];
                            //     // $number = (int) $partBefore;
                            // }

                            // var_dump($number);

                            // $partBefore = substr($lines[$line -1], $i -2, 3);
                            // $partAfter = substr($lines[$line -1], $i, 3);
                            // var_dump('before: ' . $partBefore . ' after: ' . $partAfter);
                            $part = substr($lines[$line -1], $i -2, 6);
                            var_dump($part);
                        }
                    }
                }

            }

            // var_dump($gears);


            var_dump('<br>');
        }
    }
}
