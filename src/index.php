<?php
use space\Cargoshipp;
use space\Fighterr;
use space\Spaceshipp;
include_once "space\Fighter.php";
include_once "space\Spaceship.php";
include_once "space\Cargoship.php";
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
        $ship = new space\Fighterr();
        $Fighter = new space\Spaceshipp();
        $Cargo = new space\Cargoshipp();

        $fleet = array(Spaceshipp::class, Fighterr::class, Cargoshipp::class);
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
        //     if ($i % 3 == 0) {
        //         $fleet[$i] = new space\Spaceshipp($fuel, $hp);
        //     } elseif ($i % 3 == 1) {
        //         $fleet[$i] = new space\Fighterr($fuel, $hp, $ammo);
        //     } else {
        //         $fleet[$i] = new space\Cargoshipp($fuel, $hp);
        //     }
        // }
        
        if (mt_rand() / mt_getrandmax() < 0.7) {
            $fleet[] = new space\Fighterr($ammo, $fuel, $hp);
        } elseif ($cargoships < 2) {
            // Ensure at most 2 Cargoships
            $fleet[] = new space\Cargoshipp($fuel, $hp);
            $cargoships++;
        } else {
            $fleet[] = new space\Spaceshipp($fuel, $hp);
        }
    }
    
    // Ensure there is at least 1 Cargoship
    if ($cargoships < 1) {
        foreach ($fleet as &$ship) {
            if ($ship instanceof space\Spaceshipp) {
                $ship = new space\Cargoshipp($fuel, $hp);
                break;
            }
        }
    }

        for ($i = 0; $i < $numberOfShips; $i++) {
            // Vorige regel:
            // echo "Ship " . $i + 1 . " has " . $fleet[$i]->ammo . " ammo<br>";
            
            // Vraag aan student hier kan zijn, zorg er voor dat de code zo wordt geschreven dat het weer zou moeten
            // werken. Maak dit ook voor de andere properties.
            // echo "Ship " . $i + 1 . " has " . $fleet[$i]->GetAmmo() . " ammo<br>";
        }

        echo "<br>";
        $enemyShip = new Spaceshipp(100, 100, 100);

        
        // for ($i = 0; $i < $numberOfShips; $i++) {
        //     // Ook hier moet de code worden verbeterd zodat het weer werkt.
        //     echo "Ship " . $i + 1 . " shoots at the enemy! <br>";
        //     $dmg = $fleet[$i]->Shoot();
        //     echo "Ship " . $i + 1 . " does " . $dmg . " damage.<br>";
        //     $enemyShip->hit($dmg);
        //     echo "The enemy has " . $enemyShip->GetHitPoints() . " HP left.<br>";
        //     echo "<br>";
        // }
        for ($i = 0; $i < $numberOfShips; $i++) {
            if ($i % 3 == 1) { // Check if the ship is a fighter (index 1 in the loop)
                echo "Fighter Ship $i shoots at the enemy!<br>";
                echo "Damage:" .  $dmg . "<br><br>";
            } elseif ($i % 3 == 0){
                echo "Ship " . $i . " is just a Spaceship, and therefore can not shoot<br>";
            } else {
                echo "Ship " . $i . " is just a Cargoship, and therefore can not shoot <br>";
            }
        }

        // Voorbeeld uitwerking
        do {
            for ($i = 0; $i < $numberOfShips; $i++) {
                echo "Ship " . ($i + 1) . " maneuvers to shoot at the enemy!<br>";
            
                if (is_object($fleet[$i])) {
                    $fleet[$i]->Move();
                    echo "Ship " . ($i + 1) . " reports " . $fleet[$i]->getFuel() . " fuel left.<br>";
            
                    if ($fleet[$i] instanceof Fighter) {
                        echo "Fighter Ship " . ($i + 1) . " shoots at the enemy!<br>";
                        $dmg = $fleet[$i]->Shoot();
                        echo "Fighter Ship " . ($i + 1) . " does " . $dmg . " damage.<br>";
                    }
            
                    $enemyShip->hit($dmg);
                    echo "The enemy has {$enemyShip->getHitPoints()} HP left.<br>";
                    echo "<br>";
            
                    if (!$enemyShip->isAlive()) {
                        echo "The enemy ship has been destroyed!!<br>";
                        break;
                    }
                } else {
                    echo "Element $i in the fleet is not an object, skipping...<br>";
                }
            }
        } while ($enemyShip->isAlive());
        echo "The end of the code has been reached.<br>";
        ?>


</body>

</html>\