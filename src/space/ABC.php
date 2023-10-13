<?php

// Onderstaande is een heel kort voorbeeld om aan te tonen hoe overerving werkt. Door class C van A ipv B te laten
// erven kan ook aangetoond worden dat functionaliteit gescheiden is. Voorspelde code (dropdown menu) is intelligent
// genoeg om ook alleen de opties te geven die beschikbaar zijn. Dit kan al een indicatie van een bug zijn als je,
// als ontwikkelaar, verwacht ergens toegang toe te hebben, terwijl deze niet verschijnt in het hulpmiddel.

class A
{
    public function __construct(){}

    public function aSaysHi()
    {
        echo "A says Hi!!<br>";
    }
}

class B extends A
{
    public function __construct()
    {
        parent::__construct();
    }

    public function bSaysHi()
    {
        echo "B says Hi!!<br>";
    }
}

class C extends B
{
    public function __construct()
    {
        parent::__construct();
    }

    public function cSaysHi()
    {
        echo "C says Hi!!<br>";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p style="font-family: Cambria; font-size: 40px;">
        <?php
            $a = new A();
            $b = new B();
            $c = new C();

            $a->aSaysHi();

            $b->aSaysHi();
            $b->bSaysHi();

            $c->aSaysHi();
            $c->aSaysHi();
            $c->cSaysHi();
        ?>
    </p>
</body>
</html>
