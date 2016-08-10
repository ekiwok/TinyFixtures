<?php

namespace Ekiwok\TinyFixtures;

use Doctrine\Common\Reflection\ClassFinderInterface;
use Doctrine\Common\Reflection\StaticReflectionParser;

class PropertyClassGuesser implements ClassFinderInterface
{
    private static $primitives = ['int', 'float', 'bool', 'boolean', 'void', 'null', 'string', 'array'];

    /**
     * @param \ReflectionProperty $property
     *
     * @return bool|string
     */
    public function guess(\ReflectionProperty $property)
    {
        $docComment = $property->getDocComment();
        preg_match_all('#@var\ (?<match>.*?)\n#s', $docComment, $vars);
        $match = trim(reset($vars['match']));

        if (empty($match) || in_array($match, self::$primitives)) {
            return false;
        }

        if (strpos($match, '|') !== false) {
            $manyMatches = explode('|', $match);
            $filteredMatches = array_filter($manyMatches, function ($match) {
                return !in_array($match, self::$primitives);
            });

            /* @todo revise */
            $match = reset($filteredMatches);
        }

        if ($match[0] == '\\') {
            return $match;
        }

        $useStatements = (new StaticReflectionParser($property->getDeclaringClass()->name, $this))->getUseStatements();

        foreach ($useStatements as $statement) {
            $allElements = explode('\\', $statement);
            $className = end($allElements);

            if ($className === $match) {
                return $statement;
            }
        }

        return sprintf('%s\%s', $property->getDeclaringClass()->getNamespaceName(), $match);
    }

    /**
     * {@inheritdoc}
     */
    public function findFile($class)
    {
        return (new \ReflectionClass($class))->getFileName();
    }
}
