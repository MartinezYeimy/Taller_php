<?php
class calculos {
    public $numbers;

    public function __construct($numbers) {
        $this->numbers = $numbers;
    }

    public function isValidNumbers() {
        foreach ($this->numbers as $number) {
            if (!is_numeric($number)) {
                return false;
            }
        }
        return true;
    }

    public function calculateAverage() {
        $sum = 0;
        foreach ($this->numbers as $number) {
            $sum += $number;
        }
        return $sum / count($this->numbers);
    }

    public function calculateMedian() {
        sort($this->numbers);
        $count = count($this->numbers);
        $middle = floor($count / 2);

        if ($count % 2) {
            return $this->numbers[$middle];
        } else {
            return ($this->numbers[$middle - 1] + $this->numbers[$middle]) / 2;
        }
    }

    public function calculateMode() {
        $values = array_count_values(array_map('strval', $this->numbers));
        $mode = array_keys($values, max($values));
        return $mode;
    }
}
?>