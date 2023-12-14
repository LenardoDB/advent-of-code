<?php

namespace AOC;

use AOC\Puzzle\Day1;
use AOC\Puzzle\Day2;
use AOC\Puzzle\Day3;
use AOC\Puzzle\Day4;

require_once __DIR__ . '/vendor/autoload.php';

$quiz = new Day4('./input/day4.txt');
$anwser = $quiz->run();

echo $anwser;	
