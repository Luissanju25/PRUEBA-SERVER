<?php

class Dvd extends Soporte {

    public function __construct(
        string $titulo,
        int $numero,
        float $precio,
        private string $idiomas,
        private string $formatopantalla

    ) {
        parent::__construct($titulo, $numero, $precio);
    }

    //Antes de que soporte sea abstracta
    /*public function muestraResumen(): void {
        parent::muestraResumen();
        echo "Idiomas: " . $this->idiomas . "<br>";
        echo "Formato Pantalla: " . $this->formatopantalla . "<br>";
    }*/

    public function muestraResumen(): void {
        echo "<b>Título: " . $this->titulo . "</b><br>";
        echo "Número: " . $this->numero . "<br>";
        echo "Precio sin IVA: " . number_format($this->getPrecio(), 2) . " €<br>";
        echo "Precio con IVA: " . number_format($this->getPrecioConIva(), 2) . " €<br>";
        echo "Idiomas: " . $this->idiomas . "<br>";
        echo "Formato Pantalla: " . $this->formatopantalla . "<br>";
    }

}