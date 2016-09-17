<?php

namespace Ekiwok\TinyFixtures\PathProcessors;

use Ekiwok\TinyFixtures\ContextInterface;
use Ekiwok\TinyFixtures\FixturesGeneratorInterface;

interface PathProcessorInterface
{
    /**
     * @param ContextInterface $context
     *
     * @return bool
     */
    public function appliesTo(ContextInterface $context);

    /**
     * @param ContextInterface $context
     * @param FixturesGeneratorInterface $generator
     *
     * @return mixed
     */
    public function process(ContextInterface $context, FixturesGeneratorInterface $generator);
}
