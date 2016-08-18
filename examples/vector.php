<?php

require_once(__DIR__.'/../vendor/autoload.php');

use Ekiwok\TinyFixtures\FixturesGenerator;
use spec\Ekiwok\TinyFixtures\TestFixtures\Vector;

$generator = new FixturesGenerator();
$vector = $generator->generate(Vector::class, [[1,2,3],[3,4,5]]);

print_r($vector);

//Ekiwok\TinyFixtures\TestFixtures\Vector Object
//(
//    [start:Ekiwok\TinyFixtures\TestFixtures\Vector:private] => Ekiwok\TinyFixtures\TestFixtures\Point Object
//(
//            [x:Ekiwok\TinyFixtures\TestFixtures\Point:private] => 1
//            [y:Ekiwok\TinyFixtures\TestFixtures\Point:private] => 2
//            [z:Ekiwok\TinyFixtures\TestFixtures\Point:private] => 3
//        )
//
//    [end:Ekiwok\TinyFixtures\TestFixtures\Vector:private] => Ekiwok\TinyFixtures\TestFixtures\Point Object
//(
//            [x:Ekiwok\TinyFixtures\TestFixtures\Point:private] => 3
//            [y:Ekiwok\TinyFixtures\TestFixtures\Point:private] => 4
//            [z:Ekiwok\TinyFixtures\TestFixtures\Point:private] => 5
//        )
//
//)
