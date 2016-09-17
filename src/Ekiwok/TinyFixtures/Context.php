<?php

namespace Ekiwok\TinyFixtures;

final class Context implements ContextInterface
{
    /**
     * @var array
     */
    private $path = [];

    /**
     * @var mixed
     */
    private $data = null;

    /**
     * @var array
     */
    private $expectedTypes = [];

    /**
     * @param array $path
     * @param null $data
     * @param array $expectedTypes
     */
    public function __construct(array $path = [], $data = null, array $expectedTypes = [])
    {
        $this->path = $path;
        $this->data = $data;
        $this->expectedTypes = $expectedTypes;
    }

    /**
     * {@inheritdoc}
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * {@inheritdoc}
     */
    public function getPathString()
    {
        return implode('.', $this->path);
    }

    /**
     * {@inheritdoc}
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * {@inheritdoc}
     */
    public function getExpectedTypes()
    {
        return $this->expectedTypes;
    }

    /**
     * {@inheritdoc}
     */
    public function move($name, $data, array $expectedTypes)
    {
        return new self(
            array_merge($this->path, [$name]),
            $data,
            $expectedTypes
        );
    }
}
