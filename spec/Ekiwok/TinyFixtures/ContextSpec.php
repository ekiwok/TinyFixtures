<?php
namespace spec\Ekiwok\TinyFixtures;

use Ekiwok\TinyFixtures\Context;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ContextSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Context::class);
    }

    function it_should_have_an_empty_path_after_initialization()
    {
        $this->getPath()->shouldEqual(/* $emptyArray = */[]);
    }

    function it_should_have_an_empty_string_path_after_initialization()
    {
        $this->getPathString()->shouldEqual(/* $emptyString = */"");
    }

    function it_should_return_data_it_was_constructed_with()
    {
        $point = [3,4,5];

        $this->beConstructedWith(['some', 'path'], $point);

        $this->getData()->shouldReturn($point);
    }

    function it_should_return_expected_types_it_was_constructed_with()
    {
        $expectedTypes = ['array', 'Foo[]'];

        $this->beConstructedWith(['some', 'path'], null, $expectedTypes);

        $this->getExpectedTypes()->shouldReturn($expectedTypes);
    }

    function it_should_move_to_the_further_path()
    {
        $this->beConstructedWith(['right','here', 'we']);

        $this->move('go', null, [])->getPathString()->shouldEqual('right.here.we.go');
    }
}