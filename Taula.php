<?php

/**
 * Classe que representa una taula del Bar
 * 
 */
class Taula
{
    // Identificador de la taula
    private int $numTaula;
    // Indica si s'ha pagat el compte de la taula
    private bool $pagat;
    // Conjunt de productes demanats en la taula
    private array $productes;


    public function __construct(int $numTaula)
    {
        $this->numTaula = $numTaula;
        $this->pagat = false;
        $this->productes = array();
    }

    /**
     * Afegir un producte als demanats a la taula
     */
    public function afegirProducte(Producte $p)
    {
        array_push($this->productes, $p);
    }


    /**
     * Get the value of numTaula
     */
    public function getNumTaula()
    {
        return $this->numTaula;
    }

    /**
     * Get the value of productes
     */
    public function getProductes()
    {
        return $this->productes;
    }

    /**
     * Get the value of pagat
     */
    public function getPagat()
    {
        return $this->pagat;
    }

    
}
