<?php

namespace AOC;

use AOC\Puzzle\Day1;
use AOC\Puzzle\Day2;
use AOC\Puzzle\Day3;
use AOC\Puzzle\Day4;

require_once __DIR__ . '/vendor/autoload.php';

$testMode = true;
// $quiz = new Day4(4, $testMode);
// $anwser = $quiz->run();

// echo $anwser;	

$days = [
    new Day1(1, $testMode),
    new Day2(2, $testMode),
    new Day3(3, $testMode),
    new Day4(4, $testMode),
];
