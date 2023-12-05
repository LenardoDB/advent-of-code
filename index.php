<?php

namespace AOC;

use AOC\Puzzle\Day1;

require_once __DIR__ . '/vendor/autoload.php';

$quiz = new Day1('./input/day1.txt');
$anwser = $quiz->run();

echo $anwser;	
