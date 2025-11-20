<?php

class Juego extends Soporte {
    // Constructor con simplificación de parámetros
    public function __construct(
        string $titulo,
        int $numero,
        float $precio,
        private string $consola,
        private int $minNumJugadores,
        private int $maxNumJugadores
    ) {
        parent::__construct($titulo, $numero, $precio);
    }

    /*public function getConsola(): string {
        return $this->consola;
    }

    public function getMinNumJugadores(): int {
        return $this->minNumJugadores;
    }

    public function getMaxNumJugadores(): int {
        return $this->maxNumJugadores;
    }*/
    //No nos los pide.

    public function muestraJugadoresPosibles(): void {
        if ($this->minNumJugadores === 1 && $this->maxNumJugadores === 1) {
            echo "Para un jugador<br>";
        } elseif ($this->minNumJugadores === $this->maxNumJugadores) {
            echo "Para " . $this->minNumJugadores . " jugadores<br>";
            // o echo "Para " . $this->minNumJugadores . " jugadores<br>"; Va a dar igual
        } else {
            echo "De " . $this->minNumJugadores . " a " . $this->maxNumJugadores . " jugadores<br>";
        }
    }

    //Antes de hacer soporte abstracta
    /*public function muestraResumen(): void {
        parent::muestraResumen();
        echo "Consola: " . $this->consola . "<br>";
        $this->muestraJugadoresPosibles();
    }*/

    public function muestraResumen(): void {
        echo "<b>Título: " . $this->titulo . "</b><br>";
        echo "Número: " . $this->numero . "<br>";
        echo "Precio sin IVA: " . number_format($this->getPrecio(), 2) . " €<br>";
        echo "Precio con IVA: " . number_format($this->getPrecioConIva(), 2) . " €<br>";
        echo "Consola: " . $this->consola . "<br>";
        $this->muestraJugadoresPosibles();
    }
}

?>