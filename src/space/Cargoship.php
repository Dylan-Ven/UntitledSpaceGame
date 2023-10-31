<?php
use space\Spaceshipp;
// Met Fighter als voorbeeld is kunnen de studenten als oefening het cargoship zelf proberen te maken. Met de andere
// classes en het design op papier als basis.

include_once 'Spaceship.php';

class Cargoship extends Spaceshipp
{
    private int $cargoSpace;

    public function __construct($fuel = 100, $hitPoints = 100, $cargoSpace = 100)
    {
        parent::__construct($fuel, $hitPoints);
        $this->cargoSpace = $cargoSpace;
    }

    public function loadCargo(int $cargo): void
    {
        if ($this->cargoSpace - $cargo >= 0)
        {
            $this->cargoSpace -= $cargo;
        }
        else
        {
            $this->cargoSpace = 0;
        }
    }

    // Voor gemak is er gekozen om het zonder maximum te doen. Hier zou een opdracht van gegeven kunnen worden voor
    // de klas om deze functie en daarmee de class zo aan te passen dat het wel werkt met een maximum in de vorm van
    // een capacity.
    public function unloadCargo(int $cargo): void
    {
        if ($this->cargoSpace + $cargo <= 100)
        {
            $this->cargoSpace += $cargo;
        }
        else
        {
            $this->cargoSpace = 100;
        }
    }
}