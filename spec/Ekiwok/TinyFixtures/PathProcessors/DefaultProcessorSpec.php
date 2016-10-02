<?php

namespace spec\Ekiwok\TinyFixtures\PathProcessors;

use Ekiwok\TinyFixtures\ContextInterface;
use Ekiwok\TinyFixtures\PathProcessors\DefaultProcessor;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DefaultProcessorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(DefaultProcessor::class);
    }

    function it_should_not_apply_to_contex_with_no_types(ContextInterface $context)
    {
        $context->getExpectedTypes()->willReturn([]);

        $this->appliesTo($context)->shouldEqual(false);
    }

    function it_should_apply_to_contex_with_single_expected_type(ContextInterface $context)
    {
        $context->getExpectedTypes()->willReturn(['array']);

        $this->appliesTo($context)->shouldEqual(true);
    }
}
