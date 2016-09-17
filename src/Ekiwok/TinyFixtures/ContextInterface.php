<?php

namespace Ekiwok\TinyFixtures;

interface ContextInterface
{
    /**
     * Return array containing all elements traversed from the root object.
     *
     * @return array
     */
    public function getPath();

    /**
     * Returns path as string dot separated.
     *
     * @return string
     */
    public function getPathString();

    /**
     * Gets data for current path.
     *
     * @return mixed
     */
    public function getData();

    /**
     * Empty array or an array of types/classes for current context.
     *
     * @return array
     */
    public function getExpectedTypes();

    /**
     * @param string $name
     * @param mixed $data
     * @param array $expectedTypes
     *
     * @return ContextInterface
     */
    public function move($name, $data, array $expectedTypes);
}
