<?php
class conversion {
    public $number;

    public function __construct($number) {
        $this->number = $number;
    }

    public function isValidInteger() {
        return filter_var($this->number, FILTER_VALIDATE_INT) !== false;
    }

    public function convertToBinary() {
        return decbin($this->number);
    }
}
?>