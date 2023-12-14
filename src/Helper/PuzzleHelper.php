<?php

namespace AOC\Helper;

abstract class PuzzleHelper {
    public function __construct( private $input)
    {
        $this->input = file_get_contents($input);
    }

    public function game()
    {
        // $data = $this->input;
        // $data =  trim($this->data);
        $data = explode("\n", trim($this->input));
        return array_map('trim', $data);
        // $lines = preg_split("/\s+/", $data);

        // return $lines;
    }

    abstract public function stepOne();
    abstract public function stepTwo();

    public function answer(string $step,string $answer): void
    {
        var_dump($answer);
        echo 'Answer from step ' . $step . ': ' . $answer . PHP_EOL . '<br>';
    }

    public function run()
    {
        $this->stepOne();
        $this->stepTwo();
    }
}
