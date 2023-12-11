<?php

namespace AOC;

use AOC\Puzzle\Day1;
use AOC\Puzzle\Day2;

require_once __DIR__ . '/vendor/autoload.php';

$quiz = new Day2('./input/day2.txt');
$anwser = $quiz->run();

echo $anwser;	
