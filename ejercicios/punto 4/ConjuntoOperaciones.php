<?php
require_once "Conjunto.php";

class ConjuntoOperaciones {
    public static function union(Conjunto $a, Conjunto $b): Conjunto {
        return new Conjunto(array_merge($a->getElementos(), $b->getElementos()));
    }

    public static function interseccion(Conjunto $a, Conjunto $b): Conjunto {
        return new Conjunto(array_intersect($a->getElementos(), $b->getElementos()));
    }

    public static function diferencia(Conjunto $a, Conjunto $b): Conjunto {
        return new Conjunto(array_diff($a->getElementos(), $b->getElementos()));
    }
}
?>