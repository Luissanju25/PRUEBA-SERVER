<?php

include_once "Soporte.php";
include_once "CintaVideo.php";
include_once "Dvd.php";
include_once "Juego.php";
include_once "Cliente.php";
class Videoclub {
    private $nombre;
    private $productos = [];
    private $numProductos = 0;
    private $socios = [];
    private $numSocios = 0;

    public function __construct($nombre) {
        $this->nombre = $nombre;
    }


    public function incluirProducto(Soporte $producto) {
        $this->productos[] = $producto;
        $this->numProductos++;
    }


    public function incluirCintaVideo($titulo, $precio, $duracion) {
        $cinta = new CintaVideo($titulo, $this->numProductos + 1, $precio, $duracion);
        $this->incluirProducto($cinta);

    }

    public function incluirDvd($titulo, $precio, $idiomas, $formatoPantalla) {
        $dvd = new Dvd($titulo, $this->numProductos + 1, $precio, $idiomas, $formatoPantalla);
        $this->incluirProducto($dvd);

    }

    public function incluirJuego($titulo, $precio, $consola, $minJugadores, $maxJugadores) {
        $juego = new Juego($titulo, $this->numProductos + 1, $precio, $consola, $minJugadores, $maxJugadores);
        $this->incluirProducto($juego);

    }


    public function incluirSocio($nombre, $maxAlquilerConcurrente = 3) {
        $socio = new Cliente($nombre, $this->numSocios + 1, $maxAlquilerConcurrente);
        $this->socios[] = $socio;
        $this->numSocios++;
    }


    public function listarProductos()
    {
        foreach ($this->productos as $producto)
        {
            $producto->muestraResumen();
        }
    }


    public function listarSocios() {
        foreach ($this->socios as $socio) {
            $socio->muestraResumen();
        }
    }


    public function alquilarSocioProducto($numeroCliente, $numeroSoporte) {
        // Buscar el cliente en el array de socios
        $socio = null; //Declaro un variable socio donde meteré el cleinte si existe
        foreach ($this->socios as $cliente)
        {
            if ($cliente->getNumero() === $numeroCliente) {
                $socio = $cliente;
                break;
            }
        }


        $soporte = null; //Igual para el soporte
        foreach ($this->productos as $producto) {
            if ($producto->getNumero() === $numeroSoporte) {
                $soporte = $producto;
                break;
            }
        }

        // Intentar realizar el alquiler si se encontraron ambos
        if ($socio && $soporte) //Si tengo ambos, se lo alquilo
        {
            $socio->alquilar($soporte);
        } else
        {
            if(is_null($socio))
            {
                echo "Cliente no encontrado.</br>";
            }else
            {
                echo "Soporte no encontrado.</br>";
            }

        }
    }

}