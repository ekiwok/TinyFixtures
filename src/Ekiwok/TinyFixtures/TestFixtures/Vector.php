<?php

namespace Ekiwok\TinyFixtures\TestFixtures;

use Ekiwok\TinyFixtures\Nested\Foo;

class Vector
{
    /**
     * @var \Ekiwok\TinyFixtures\TestFixtures\Point
     */
    private $start;

    /**
     * @var Point
     */
    private $end;

    /**
     * @var
     */
    private $withEmptyVar;

    /**
     * @var string
     * @var Point
     */
    private $withDoubledAnnotation;

    /**
     * @var Point|string|Vector|null
     */
    private $mayVary;

    /**
     * @var Foo
     */
    private $nested;

    /**
     * @param Point $start
     * @param Point $end
     */
    public function __construct(Point $start, Point $end)
    {
        $this->start = $start;
        $this->end = $end;
    }
}
