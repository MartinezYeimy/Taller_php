<?php
class Fibonacci {
    public $number;

    public function __construct($number) {
        $this->number = $number;
    }

    public function calculate() {
        $sequence = [];
        $a = 0;
        $b = 1;
        for ($i = 0; $i < $this->number; $i++) {
            $sequence[] = $a;
            $temp = $a;
            $a = $b;
            $b = $temp + $b;
        }
        return $sequence;
    }
}
?>