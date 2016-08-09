<?php

require_once(__DIR__.'/../vendor/autoload.php');

use Ekiwok\TinyFixtures\FixturesGenerator;

class ClassicBob
{
    /**
     * @var Address
     */
    private $address;

    /**
     * @var Wallet
     */
    private $wallet;
}

class Address
{
    private $line1;

    private $line2;

    private $city;

    public function __construct($line1, $line2, $city)
    {
        $this->line1 = $line1;
        $this->line2 = $line2;
        $this->city = $city;
    }
}

class Wallet
{
    /**
     * @var array
     */
    private $creditCards = [];

    /**
     * @var Money
     */
    private $cash;
}

class Money
{
    private $value;

    public function __construct($money)
    {
        // check does money make sense
        $this->value = $money;
    }
}

$generator = new FixturesGenerator();

$bob = $generator->generate(ClassicBob::class, [
    'address' => ['Wild County', 'Secret st.', 'Todo'],
    'wallet' => [
        'creditCards' => ['visa', 'mastercard'],
        'cash' => 123.45,
    ]
]);

print_r($bob);

//    ClassicBob Object
//    (
//        [address:ClassicBob:private] => Address Object
//        (
//            [line1:Address:private] => Wild County
//            [line2:Address:private] => Secret st.
//            [city:Address:private] => Todo
//        )
//
//        [wallet:ClassicBob:private] => Wallet Object
//        (
//            [creditCards:Wallet:private] => Array
//            (
//                [0] => visa
//                [1] => mastercard
//            )
//
//           [cash:Wallet:private] => Money Object
//           (
//                [value:Money:private] => 123.45
//           )
//
//        )
//
//    )