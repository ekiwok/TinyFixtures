<?php

namespace spec\Ekiwok\TinyFixtures;

use Ekiwok\TinyFixtures\FixturesGenerator;
use spec\Ekiwok\TinyFixtures\TestFixtures\Point;
use spec\Ekiwok\TinyFixtures\TestFixtures\Vector;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FixturesGeneratorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(FixturesGenerator::class);
    }

    function it_generates_itself()
    {
        $this->generate(FixturesGenerator::class)->shouldBeAnInstanceOf(FixturesGenerator::class);
    }

    function it_generates_point_from_array_with_values_coresponding_to_properties()
    {
        $this->generate(Point::class, ['z' => 3, 'x' => 4, 'y' => 5])
            ->shouldBeAnInstanceOf(Point::class);
    }

    function it_should_generate_vector()
    {
        $this->generate(Vector::class, ['start' => [], 'end'=>[]])
            ->shouldBeAnInstanceOf(Vector::class);
    }
}
