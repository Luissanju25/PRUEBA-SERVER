<?php
include_once "Resumible.php";
abstract class Soporte implements Resumible //implementa la interfaz Resumible para el último ejercicio
{
    private static float $IVA = 0.21;

    // Constructor con simplificación de parámetros (PHP8)
    public function __construct(
        public string $titulo,
        public int $numero,
        public float $precio
    ) {}

    public function getPrecio(): float {
        return $this->precio;
    }

    public function getPrecioConIva(): float {
        return $this->precio * (1 + self::$IVA);
    }

    public function getNumero(): int {
        return $this->numero;
    }

    //Antes de hacerla abstracta
    /*public function muestraResumen(): void {
        echo "<b>Título: " . $this->titulo . "</b><br>";
        echo "Número: " . $this->numero . "<br>";
        echo "Precio sin IVA: " . number_format($this->getPrecio(), 2) . " €<br>";
        echo "Precio con IVA: " . number_format($this->getPrecioConIva(), 2) . " €<br>";
    }*/

    abstract public function muestraResumen();
}