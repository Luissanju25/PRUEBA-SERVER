<?php
class CintaVideo extends Soporte {

    public function __construct(
        string $titulo,
        int $numero,
        float $precio,
        private int $duracion
    ) {
        //Hemos de invocar al del padre de manera explícita.
        parent::__construct($titulo, $numero, $precio);
    }

    //Antes de hacer muestraresumen abstracta
    /*public function muestraResumen(): void {
        // Llamo a muestraresumen del padre
        parent::muestraResumen();
        // Pero además, añado la duración
        echo "Duración: " . $this->duracion . " minutos<br>";
    }*/

    public function muestraResumen(): void {
        echo "<b>Título: " . $this->titulo . "</b><br>";
        echo "Número: " . $this->numero . "<br>";
        echo "Precio sin IVA: " . number_format($this->getPrecio(), 2) . " €<br>";
        echo "Precio con IVA: " . number_format($this->getPrecioConIva(), 2) . " €<br>";
        echo "Duración: " . $this->duracion . " minutos<br>";
    }
}