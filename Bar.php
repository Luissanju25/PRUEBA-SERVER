<?php

include_once 'Taula.php';
include_once 'Producte.php';


/**
 * Classe que representa un Bar concret
 * 
 * Un Bar té una carta de productes i un conjunt de taules a les que es pot servir
 * 
 */

class Bar
{
    private $taules;
    private $carta;

    /**
     * Carrega de dades de prova
     */
    public function __construct()
    {
        // Creació de taules del bar
        $this->taules = array();
        $taula0 = new Taula(0);
        array_push($this->taules, $taula0);
        $taula1 = new Taula(1);
        array_push($this->taules, $taula1);
        $taula2 = new Taula(2);
        array_push($this->taules, $taula2);
        $taula3 = new Taula(3);
        array_push($this->taules, $taula3);

        // Creació de productes disponibles al bar
        $this->productes = array();
        $p1 = new Producte("Café", 1.00);
        $p2 = new Producte("Cervessa", 1.50);
        $p3 = new Producte("Cola Light", 2.50);
        $p4 = new Producte("Braves", 3.50);
        $p5 = new Producte("Sepia", 7.50);
        $p6 = new Producte("Aigua", 1.50);
        // Carreguem els productes de prova a la carta
        $this->carta = array($p1, $p2, $p3);

        // Afegir comandes a les taules
        $taula0->afegirProducte($p1);
        $taula0->afegirProducte($p2);
        $taula0->afegirProducte($p4);
        $taula0->afegirProducte($p6);

        $taula1->afegirProducte($p3);
        $taula1->afegirProducte($p3);
        $taula1->afegirProducte($p1);
        $taula1->afegirProducte($p5);

        $taula2->afegirProducte($p1);
        $taula2->afegirProducte($p6);
        $taula2->afegirProducte($p1);
        $taula2->afegirProducte($p4);

        // Taula3 buida
    }


    /**
     * Get the value of taules
     */
    public function getTaules()
    {
        return $this->taules;
    }



    /**
     * Get the value of productes
     */
    public function getProductes()
    {
        return $this->productes;
    }

 
    public function getTaulaByNum($numTaula){
        foreach ($this->taules as $t){
            if ( $t->getNumTaula() == $numTaula ){
                return $t;
            }
        }
        return null;
    }
}
