<?php

namespace Ekiwok\TinyFixtures\TestFixtures;

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
     * @param Point $start
     * @param Point $end
     */
    public function __construct(Point $start, Point $end)
    {
        $this->start = $start;
        $this->end = $end;
    }
}
