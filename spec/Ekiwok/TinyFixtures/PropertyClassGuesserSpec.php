<?php

namespace spec\Ekiwok\TinyFixtures;

use Ekiwok\TinyFixtures\Nested\Foo;
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

    function it_should_not_crash_on_empty_var()
    {
        $property = (new \ReflectionClass(Vector::class))->getProperty('withEmptyVar');

        $this->guess($property)->shouldBeLike(false);
    }

    function it_should_not_crash_on_repeated_annotation()
    {
        $property = (new \ReflectionClass(Vector::class))->getProperty('withDoubledAnnotation');

        $this->guess($property)->shouldBeLike(false);
    }

    function it_should_pick_class_if_there_are_many_possibilities()
    {
        $property = (new \ReflectionClass(Vector::class))->getProperty('mayVary');

        $this->guess($property)->shouldMatch(sprintf('/^(\\\\){0,1}%s$/', addslashes(Point::class)));
    }

    function it_should_pick_nested_class()
    {
        $property = (new \ReflectionClass(Vector::class))->getProperty('nested');

        $this->guess($property)->shouldMatch(sprintf('/^(\\\\){0,1}%s$/', addslashes(Foo::class)));
    }
}
