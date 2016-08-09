<?php

namespace Ekiwok\TinyFixtures;

class PropertyClassGuesser
{
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

        if (in_array($match, ['int', 'float', 'bool', 'boolean', 'void', 'null', 'string', 'array'])) {
            return false;
        }

        if ($match[0] == '\\') {
            return $match;
        }

        return sprintf('%s\%s', $property->getDeclaringClass()->getNamespaceName(), $match);
    }
}
