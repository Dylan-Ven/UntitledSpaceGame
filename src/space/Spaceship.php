<?php

namespace space;

// Vanaf hier kan er verteld worden dat dit niet zomaar meer een class is maar een baseclass of parentclass.
class Spaceship
{
    // Door te kijken naar het ontwerp in het Readme bestand, kunnen we zien dat alleen onderstaande properties
    // hier nog nodig zijn.
    // In eerste instantie is het goed om ze private te zetten. Net als in de vorige versie. Hiermee is dan te
    // demonstreren wat het verschil tussen private en protected is. Op dat moment is ook weer de foutmelding te
    // tonen zodat studenten ook daar weer oefening krijgen in het lezen van foutmeldingen (ook al hebben ze deze dan
    // al een keer gehad de vorige les).
    protected int $fuel;
    protected int $hitPoints;
    protected bool $isAlive;

    // Vanaf hier is de class vooral minder groot, aanpassingen zijn minimaal en vinden plaats vooral in de constructor.
    public function __construct($fuel = 100, $hitPoints = 100)
    {
        $this->fuel = $fuel;
        $this->hitPoints = $hitPoints;
        $this->isAlive = true;
    }

    public function hit($damage)
    {
        if($this->hitPoints - $damage > 0)
        {
            $this->hitPoints -= $damage;
        }
        else
        {
            $this->isAlive = false;
        }
    }

    public function move()
    {
        $fuelUsage = 2;
        if ($this->fuel - $fuelUsage > 0) {
            $this->fuel -= $fuelUsage;
        } else {
            $this->fuel = 0;
        }
    }

    public function refuel(int $fuel): void
    {
        if ($fuel < 0)
        {
            $fuel = 0;
        }
        if ($fuel > 100)
        {
            $fuel = 100;
        }

        $this->fuel = $fuel;
    }

    public function repair(int $hitPoints): void
    {
        if($hitPoints < 1)
        {
            $hitPoints = 1;
        }
        if($hitPoints > 100)
        {
            $hitPoints = 100;
        }

        $this->hitPoints = $hitPoints;
    }

    public function getFuel(): int
    {
        return $this->fuel;
    }

    public function getHitPoints(): int
    {
        return $this->hitPoints;
    }

    public function IsAlive(): bool
    {
        return $this->isAlive;
    }
}