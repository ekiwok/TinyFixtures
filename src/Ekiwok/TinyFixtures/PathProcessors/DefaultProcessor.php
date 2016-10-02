<?php

namespace Ekiwok\TinyFixtures\PathProcessors;

use Ekiwok\TinyFixtures\ContextInterface;
use Ekiwok\TinyFixtures\FixturesGeneratorInterface;

class DefaultProcessor implements PathProcessorInterface
{
    /**
     * {@inheritdoc}
     */
    public function appliesTo(ContextInterface $context)
    {
        return !empty($context->getExpectedTypes());
    }

    /**
     * {@inheritdoc}
     */
    public function process(ContextInterface $context, FixturesGeneratorInterface $generator)
    {
        // TODO: Implement process() method.
    }
}
