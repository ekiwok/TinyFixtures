<?php

namespace Ekiwok\TinyFixtures;

interface FixturesGeneratorInterface
{
    /**
     * @param $fixtureClass
     * @param array $data
     *
     * @return object
     */
    public function generate($fixtureClass, $data = []);
}
