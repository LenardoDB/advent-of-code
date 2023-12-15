<?php

namespace AOC;

use AOC\Puzzle\Day1;
use AOC\Puzzle\Day2;
use AOC\Puzzle\Day3;
use AOC\Puzzle\Day4;
use AOC\Puzzle\Day5;

require_once __DIR__ . '/vendor/autoload.php';

$testMode = true;

$days = [
    new Day1(1, $testMode),
    new Day2(2, $testMode),
    new Day3(3, $testMode),
    new Day4(4, $testMode),
    new Day5(5, $testMode),
];
