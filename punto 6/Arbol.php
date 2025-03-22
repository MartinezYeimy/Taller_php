<?php
include 'Nodo.php';

class Arbol {
    public $raiz;

    public function __construct() {
        $this->raiz = null;
    }

    public function insertar($valor) {
        $this->raiz = $this->insertarRecursivo($this->raiz, $valor);
    }

    private function insertarRecursivo($nodo, $valor) {
        if ($nodo === null) {
            return new Nodo($valor);
        }

        if ($valor < $nodo->valor) {
            $nodo->izquierdo = $this->insertarRecursivo($nodo->izquierdo, $valor);
        } elseif ($valor > $nodo->valor) {
            $nodo->derecho = $this->insertarRecursivo($nodo->derecho, $valor);
        }

        return $nodo;
    }

    public function mostrarArbol($nodo) {
        if ($nodo === null) {
            return "";
        }

        $resultado = "(" . $nodo->valor;
        $resultado .= " " . $this->mostrarArbol($nodo->izquierdo);
        $resultado .= " " . $this->mostrarArbol($nodo->derecho);
        $resultado .= ")";

        return $resultado;
    }
}
?>