<?php

include_once "space\Spaceship.php";
include_once "space\Fighter.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <p style="font-family: Cambria; font-size: 40px;">
        <?php
        // Allereerst even een voorbeeld en een kans om een foutmelding te geneneren en te analyseren.
        $ship = new space\Fighter();
        // Onderstaande kan niet meer:
        // echo $ship->ammo;
        // En je krijgt de melding: Fatal error: Uncaught Error: Cannot access private property Spaceship::$ammo
        // in C:\Users\<gebruiker>\PhpstormProjects\OOP_2B\02_Les\index.php:17 Stack trace: #0 {main} thrown
        // in C:\Users\<gebruiker>\PhpstormProjects\OOP_2B\02_Les\index.php on line 17
        // Vragen voor de student kunnen zijn: analyseer wat er staat? Wat betekend dit voor jou? Is het nu een goede
        // keuze om dan maar de access aan te passen?

        // Door nu de functie aan te roepen krijgen we de waarde alsnog.
        echo "The ship has " . $ship->GetAmmo() . " ammo.<br><br>";


        $fleet = array(Spaceship::class);
        // Ter voorkoming van Magic Numbers
        $numberOfShips = 10;
        $minAmmo = 10;
        $maxAmmo = 100;
        $minFuel = 10;
        $maxFuel = 100;
        $minHP = 10;
        $maxHP = 100;

        // Na de verandering in de class, is er in het aanmaken van de vloot niets verandert.
        for ($i = 0; $i < $numberOfShips; $i++) {
            $ammo = random_int($minAmmo, $maxAmmo);
            $fuel = random_int($minFuel, $maxAmmo);
            $hp = random_int($minHP, $maxHP);
            $fleet[$i] = new space\Spaceship($ammo, $fuel, $hp);
        }

        for ($i = 0; $i < $numberOfShips; $i++) {
            // Vorige regel:
            // echo "Ship " . $i + 1 . " has " . $fleet[$i]->ammo . " ammo<br>";

            // Vraag aan student hier kan zijn, zorg er voor dat de code zo wordt geschreven dat het weer zou moeten
            // werken. Maak dit ook voor de andere properties.
            echo "Ship " . $i + 1 . " has " . $fleet[$i]->GetAmmo() . " ammo<br>";
        }

        echo "<br>";

        // Voor het 'transport' van data wordt er een nieuw schip aangemaakt, een vijand, om op te schieten.
        $enemyShip = new space\(100, 150, 100);

        for ($i = 0; $i < $numberOfShips; $i++) {
            // Ook hier moet de code worden verbeterd zodat het weer werkt.
            echo "Ship " . $i + 1 . " shoots at the enemy! <br>";
            $dmg = $fleet[$i]->Shoot();
            echo "Ship " . $i + 1 . " does " . $dmg . " damage.<br>";
            $enemyShip->hit($dmg);
            echo "The enemy has " . $enemyShip->GetHitPoints() . " HP left.<br>";
            echo "<br>";
        }

        // Voorbeeld uitwerking
        do {
            for ($i = 0; $i < $numberOfShips; $i++) {
                echo "Ship " . $i + 1 . " manouvres to shoot at the enemy!<br>";
                $fleet[$i]->Move();
                echo "Ship " . $i + 1 . " reports " . $fleet[$i]->getFuel() . " fuel left.<br>";

                echo "Ship " . $i + 1 . " shoots at the enemy! <br>";
                $dmg = $fleet[$i]->Shoot();
                echo "Ship " . $i + 1 . " does " . $dmg . " damage.<br>";
                $enemyShip->hit($dmg);
                echo "The enemy has {$enemyShip->getHitPoints()} HP left.<br>";
                echo "<br>";
                if (!$enemyShip->isAlive()) {
                    echo "The enemy ship has been destroyed!!<br>";
                    break;
                }
            }
        } while ($enemyShip->isAlive());

        echo "The end of the code has been reached.<br>";
        ?>


</body>

</html>