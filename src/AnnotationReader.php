<?php

namespace App;

use ReflectionClass;

class AnnotationReader
{
    protected $reference;

    public function __construct($reference)
    {
        $this->reference = $reference;
    }

    public function having($annotation)
    {
        $reflector = new \ReflectionClass($this->reference);
        $methods = $reflector->getMethods();
        $results = [];

        foreach ($methods as $method) {
            $docBlock = $method->getDocComment();

            if(stristr($docBlock, "@{$annotation}") !== false){
                $results[] = $method->getName();
            }
        }

        return $results;
    }

}
