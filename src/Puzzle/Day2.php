<?php

namespace AOC\Puzzle;

use AOC\Helper\PuzzleHelper;

class Day2 extends PuzzleHelper
{
    public function stepOne()
    {
        $lines = $this->game();
        $ans = 0;
        $maxRed = 12;
        $maxGreen = 13;
        $maxBlue = 14;

        foreach ($lines as $line) {
            $possible = true;

            $gameData = explode(":", $line);
            $gameId = $gameData[0];
            $gameId = (int) str_replace('Game ', '', $gameId);

            $games = explode(";", $gameData[1]);

            foreach ($games as $game) {
                $red = 0;
                $green = 0;
                $blue = 0;

                $blocks = explode(",", $game);

                foreach ($blocks as $color) {
                    if (strpos($color, 'red') !== false) {
                        $red = (int) (str_replace('red', '', $color));
                    }

                    if (strpos($color, 'green') !== false) {
                        $green = (int) (str_replace('green', '', $color));
                    }

                    if (strpos($color, 'blue') !== false) {
                        $blue = (int) (str_replace('blue', '', $color));
                    }
                }
                
                if ($red > $maxRed || $green > $maxGreen || $blue > $maxBlue) {
                    $possible = false;
                }
            }
        
            if($possible) {
                $ans += $gameId;
            }
        }

        $this->answer('one', $ans);
    }

    public function stepTwo()
    {
        $lines = $this->game();
        $answer = 0;

        foreach($lines as $line) {
            $red = 0;
            $blue = 0;
            $green = 0;

            $gameData = explode(":", $line);
            $games = explode(";", $gameData[1]);

            foreach($games as $game) {
                $cubes = explode(",", $game);

                foreach($cubes as $cube) {
                    if(strpos($cube, 'red') !== false) {
                        $count = (int) (str_replace('red', '', $cube));
                        if($count > $red) {
                            $red = $count;
                        }
                    }

                    if(strpos($cube, 'green') !== false) {
                        $count = (int) (str_replace('green', '', $cube));
                        if($count > $green) {
                            $green = $count;
                        }
                    }

                    if(strpos($cube, 'blue') !== false) {
                        $count = (int) (str_replace('blue', '', $cube));
                        if($count > $blue) {
                            $blue = $count;
                        }
                    }
                }
            }

            $total = $red * $green * $blue;
            $answer += $total;
        }

        $this->answer('two', $answer);
    }
}
