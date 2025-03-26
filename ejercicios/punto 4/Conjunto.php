<?php
class Conjunto {
    private array $elementos;

    public function __construct(array $elementos) {
        $this->elementos = array_unique($elementos);
    }

    public function getElementos(): array {
        return $this->elementos;
    }
}
?>