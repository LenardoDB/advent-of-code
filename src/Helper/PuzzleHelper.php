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

        $this->initialize();
        $this->run();
    }

    public function game(bool $asArray = true)
    {
        $data = $this->input;
        if( $asArray ) {
            return array_map('trim', explode("\n", trim($data)));
        } else {
            return trim($data);
        }
    }

    abstract public function stepOne();
    abstract public function stepTwo();

    protected function initialize(): void
    {
        // void method, can be used before part1 & part2 is called
    }


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
