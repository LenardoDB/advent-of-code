<?php

namespace AOC\Puzzle;

class Day1 
{

    public function __construct(
        public string $input
    )
    {
        $this->input = file_get_contents($input);
    }

    public function stepOne()
    {
        $data = $this->input;
        $words = preg_split("/\s+/", $data);
        $sum = 0;

        foreach ($words as $word) {
            $firstNumber = substr(preg_replace("/[^0-9]/", "", $word), 0, 1);
            $lastNumber = substr(preg_replace('/[^0-9]/', '', strrev($word)), 0, 1);

            $additionalNumber = intval($firstNumber . $lastNumber);
            $sum += $additionalNumber;
        }

        echo 'Answer from step one: ' . $sum . PHP_EOL . '<br>';
    }

    public function stepTwo()
    {
        $data = $this->input;
        $words = preg_split("/\s+/", $data);
        $sum1 = 0;
        $digits = [
            'one' => 1,
            'two' => 2,
            'three' => 3,
            'four' => 4,
            'five' => 5,
            'six' => 6,
            'seven' => 7,
            'eight' => 8,
            'nine' => 9,
        ];

        foreach ($words as $word) {
            $numbers = [];
            preg_match_all('/(?=(one|two|three|four|five|six|seven|eight|nine|\d))/', $word, $matches);

            foreach ($matches[1] as $match) {
                if( array_key_exists(strtolower($match), $digits)) {
                    $numbers[] = $digits[strtolower($match)];
                } elseif (is_numeric($match)) {
                    $numbers[] = intval($match);
                } 
            }

            $sum1 += intval($numbers[0] . $numbers[count($numbers) - 1]);
        }

        echo 'Answer from step two: ' . $sum1 . PHP_EOL;
    }

    public function run()
    {
        $this->stepOne();
        $this->stepTwo();
    }
}
