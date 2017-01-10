<?php

namespace Ekiwok\TinyFixtures;

class FixturesGenerator implements FixturesGeneratorInterface
{
    /**
     * @var PropertyClassGuesser
     */
    private $guesser;

    public function __construct()
    {
        $this->guesser = new PropertyClassGuesser();
    }

    /**
     *
     * @deprecated
     *
     * @param $fixtureClass
     * @param array $data
     *
     * @return object
     */
    public function generate($fixtureClass, $data = [])
    {
        $reflection = new \ReflectionClass($fixtureClass);

        if (! is_array ($data)) {
            return new $fixtureClass($data);
        } else if (array_keys($data) === range(0, count($data)-1)) {
            return $this->concreateGenerate($reflection, $data);
        }

        return $this->concreteGenerateWithoutConstructor($reflection, $data);
    }

    private function concreateGenerate(\ReflectionClass $reflection, array $data)
    {
        $constructorParameters = $reflection->getConstructor()->getParameters();

        foreach ($constructorParameters as $key => $parameter) {
            $parameterClass = $parameter->getClass();

            if (! is_null($parameterClass)) {
                $data[$key] = $this->generate($parameterClass->name, $data[$key]);
            }
        }

        return $reflection->newInstance(...$data);
    }

    private function concreteGenerateWithoutConstructor(\ReflectionClass $reflection, array $data)
    {
        $object = $reflection->newInstanceWithoutConstructor();

        $properties = $reflection->getProperties();
        foreach ($properties as $property) {
            $name = $property->getName();
            if (! array_key_exists($name, $data)) {
                continue;
            }

            $propertyIsInaccessible = $property->isPrivate() || $property->isProtected();
            $propertyIsInaccessible ? $property->setAccessible(true) : null ;

            $propertyClass = $this->guesser->guess($property);

            $value = ($propertyClass !== false)
                ? $this->generate($propertyClass, $data[$name])
                : $data[$name];

            $property->setValue($object, $value);
        }

        return $object;
    }
}
