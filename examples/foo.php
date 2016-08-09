<?php

require_once(__DIR__.'/../vendor/autoload.php');

use Ekiwok\TinyFixtures\FixturesGenerator;

final class Foo extends Bar
{
    /**
     * @var Bar
     */
    private $bar;

    public function __construct(Bar $bar)
    {
        $this->bar = $bar;
    }

    public function getSecret()
    {
        return $this->bar->secret;
    }
}

class Bar
{
    /**
     * @var string
     */
    protected $secret;
}

$generator = new FixturesGenerator();
$foo = $generator->generate(Foo::class, ['bar' => ['secret' => 'dontdoshots'] ]);

echo $foo->getSecret(); //dontdoshots