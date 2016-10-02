<?php

namespace Ekiwok\TinyFixtures\PathProcessors;

use Ekiwok\TinyFixtures\ContextInterface;

class PathProcessorException extends \RuntimeException
{
    /**
     * @param PathProcessorInterface $callee
     * @param ContextInterface $context
     *
     * @return PathProcessorException
     */
    static public function malformedContextData(PathProcessorInterface $callee, ContextInterface $context)
    {
        return new self(sprintf(
            "%s applies to %s but cannot parse following data: %s",
            get_class($callee),
            $context->getPath(),
            var_export($context->getData())
        ));
    }
}
