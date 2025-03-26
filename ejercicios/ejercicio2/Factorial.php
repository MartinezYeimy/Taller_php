<?php
class Factorial {
    public $number;

    public function __construct($number) {
        $this->number = $number;
    }

    public function calculate() {
        $result = 1;
        $procedure = "";
        for ($i = 1; $i <= $this->number; $i++) {
            $result *= $i;
            $procedure .= $i;
            if ($i < $this->number) {
                $procedure .= " * ";
            }
        }
        return [$result, $procedure];
    }
}
?>