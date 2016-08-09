<?php

namespace spec\Ekiwok\TinyFixtures;

use Ekiwok\TinyFixtures\PropertyClassGuesser;
use Ekiwok\TinyFixtures\TestFixtures\Point;
use Ekiwok\TinyFixtures\TestFixtures\Vector;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PropertyClassGuesserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(PropertyClassGuesser::class);
    }

    function it_should_return_false_for_primitive_type()
    {
        $property = (new \ReflectionClass(Point::class))->getProperty('x');

        $this->guess($property)->shouldEqual(false);
    }

    function it_should_return_full_class_name_from_annotation()
    {
        $property = (new \ReflectionClass(Vector::class))->getProperty('start');

        $this->guess($property)->shouldMatch(sprintf('/^(\\\\){0,1}%s$/', addslashes(Point::class)));
    }

    function it_should_guess_full_class_name_from_annotation()
    {
        $property = (new \ReflectionClass(Vector::class))->getProperty('end');

        $this->guess($property)->shouldMatch(sprintf('/^(\\\\){0,1}%s$/', addslashes(Point::class)));
    }
}
