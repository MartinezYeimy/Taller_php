<?php
include 'Nodo.php';

class Arbol {
    public $raiz;

    public function __construct() {
        $this->raiz = null;
    }

    public function construirDesdePreInorden($preorden, $inorden) {
        return $this->construirArbol($preorden, $inorden);
    }

    private function construirArbol($preorden, $inorden) {
        if (empty($preorden) || empty($inorden)) {
            return null;
        }

        $raizValor = array_shift($preorden);
        $raiz = new Nodo($raizValor);

        $posicion = array_search($raizValor, $inorden);

        $inordenIzq = array_slice($inorden, 0, $posicion);
        $inordenDer = array_slice($inorden, $posicion + 1);

        $preordenIzq = array_slice($preorden, 0, count($inordenIzq));
        $preordenDer = array_slice($preorden, count($inordenIzq));

        $raiz->izquierdo = $this->construirArbol($preordenIzq, $inordenIzq);
        $raiz->derecho = $this->construirArbol($preordenDer, $inordenDer);

        return $raiz;
    }
}
?>