<?php

namespace space;

// Allereerst, zorgen dat het bestand met daarin de base gevonden wordt.
include_once 'space\Spaceship.php';

// Door de code extends toe te voegen zeggen we tegen de code: Erf van Spaceship dat wat public of protected is.
// Private wordt doorgegeven. Bedenk ook dat overerving alleen naar beneden in de hierarchie wordt doorgegeven. Het
// vergelijk is hier te maken met ouders en kinderen, DNA gaat van opa en oma, naar ouder, naar kind, niet terug.
// Je zou ook kunnen stellen dat extends zegt wat het belooft te doen, uitbreiden van Spaceship in dit geval.
class Fighterr extends Spaceshipp
{
    // Fighter erft hier de rest van Spaceship en heeft alleen ammo nodig.
    private int $ammo;

    // De constructor parameters bevatten hier wel ALLE properties, ook die van één of meerdere parents
    public function __construct($fuel = 100, $hitPoints = 100, $ammo = 100)
    {
        // Door de constructor aan te roepen van de parent kunnen de properties daarvan doorgegeven worden.
        parent::__construct($fuel, $hitPoints);
        // Hierna zetten we de properties van deze child class.
        $this->ammo = $ammo;
    }

    // Deze functie kan vanuit een vorige versie gekopieerd worden.
    public function shoot(): int
    {
        $shot = 5;
        $damage = 2;

        if ($this->ammo - $shot >= 0) {
            $this->ammo -= $shot;
            return ($shot * $damage);
        } else {
            return 0;
        }
    }

    // Deze functie kan vanuit een vorige versie gekopieerd worden. Hier is gekozen om de naam meteen te verbeteren
    public function reload(int $ammo): void
    {
        if ($ammo < 0) {
            $ammo = 0;
        }
        if ($ammo > 100) {
            $ammo = 100;
        }

        $this->ammo = $ammo;
    }

    // Deze functie kan vanuit een vorige versie gekopieerd worden.
    public function getAmmo(): int
    {
        return $this->ammo;
    }
}
