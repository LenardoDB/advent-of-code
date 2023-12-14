<?php

namespace AOC\Helper;

abstract class PuzzleHelper {
    public function __construct( private $input, private bool $testMode = false, private int $day = 0)
    {
        $this->day = $input;
        if($testMode) {
            $input = './input/example/example' . $input . '.txt';
        } else {
            $input = './input/day' . $input . '.txt';
        }
        $this->input = file_get_contents($input);
        $this->run();
    }

    public function game()
    {
        $data = explode("\n", trim($this->input));

        return array_map('trim', $data);
    }

    abstract public function stepOne();
    abstract public function stepTwo();

    public function answer(string $step,string $answer): void
    {
        echo 'Answer from step ' . $step . ': ' . $answer . PHP_EOL . '<br>';
    }

    public function run()
    {
        echo '############################################ Start Day ' . $this->day . ' ############################################' . PHP_EOL . '<br>';
        $this->stepOne();
        $this->stepTwo();
        echo '############################################ End Day ' . $this->day . ' ############################################' . PHP_EOL . '<br><br><br>';
    }
}
