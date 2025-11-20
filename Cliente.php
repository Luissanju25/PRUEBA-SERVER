<?php

class Cliente
{
    private array $soportesAlquilados = [];
    private int $numSoportesAlquilados = 0;

    public function __construct(
        private string $nombre,
        private int $numero,
        private int $maxAlquilerConcurrente = 3
    ) {}

    public function getNumero(): int {
        return $this->numero;
    }

    public function setNumero(int $numero): void {
        $this->numero = $numero;
    }

    public function getNumSoportesAlquilados(): int {
        return $this->numSoportesAlquilados;
    }

    public function muestraResumen(): void
    {
        echo "Cliente: " . $this->nombre . "<br>";
        echo "Número de cliente: " . $this->numero . "<br>";
        echo "Alquileres actuales: " . count($this->soportesAlquilados) . "<br>";
    }




    /* Creo la función tieneAlquilado y le paso como parámetro el soporte que quiero comprobar.
    Como el atributo soportesAlquilados es un array donde se almacenarán los soportes alquilados, lo recorro.
    Cuando recorro, comparo, si en el array hay uno que coincide con el que le paso, está alquilado y
    devuelve un booleano que será true si no, devuelve false.
    */
    public function tieneAlquilado(Soporte $soporte): bool
    {
        foreach ($this->soportesAlquilados as $alquilado)
        {
            if ($alquilado === $soporte)
            {
                return true;
            }
        }
        return false;
    }

    public function alquilar(Soporte $soporte): bool
    {
        //Primero consultamos si lo tiene ya alquilado, y si ya lo tiene, pues devolvemos false y se acaba.
        if ($this->tieneAlquilado($soporte))
        {
            $soporte->muestraResumen();
            echo $soporte->titulo . " ya está alquilado por el cliente.</b><br><br>";
            return false;
        }


        if (count($this->soportesAlquilados) >= $this->maxAlquilerConcurrente)
        {
            $soporte->muestraResumen();
            echo "<b>No se puede alquilar el soporte '" . $soporte->titulo . "'. Has alcanzado el límite de " . $this->maxAlquilerConcurrente . " alquileres concurrentes.</b><br><br>";
            return false;
        }


        $this->soportesAlquilados[] = $soporte;
        $this->numSoportesAlquilados++;

        $soporte->muestraResumen();
        echo "<b>Soporte alquilado a " . $this->nombre."</b><br>";

        echo "<br><br>";
        return true;
    }

    public function devolver(int $numSoporte): bool
    {
        /*Recorro el array de alquilados. En la función anterior hemos metido los soportes,
         por lo que deberíamos poder acceder a los métodos de Soporte como "getNumero"
        y comprobar si coincide, si lo hace, se devuelve, se muestra mensaje y se devuelve true.
        */
        foreach ($this->soportesAlquilados as $clave => $alquilado)
        {
            if ($alquilado->getNumero() === $numSoporte)
            {
                unset($this->soportesAlquilados[$clave]);//Del array de alquilados, me cargo el que le hemos pasado
                $this->numSoportesAlquilados--;
                echo "<b>Se ha devuelto el soporte  $numSoporte.</b><br><br>";
                return true;
            }

        }


        echo "<b>Este cliente no tiene el soporte $numSoporte.</b><br><br>";
        return false;
    }

    public function listarAlquileres(): void
    {
        echo $this->nombre . " tiene " . count($this->soportesAlquilados) . " soportes alquilados.<br>";

        $i=1;
        foreach ($this->soportesAlquilados as $soporte)
        {
            echo "<b>* Soporte alquilado nº: $i </b><br>";
            $soporte->muestraResumen() . "<br><br>";
            $i++;
        }
    }
}