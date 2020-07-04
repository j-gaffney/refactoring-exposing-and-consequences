<?php

namespace App;

use App\Method;
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

         $methods = [];

        /** @var Method $method */
        foreach ($this->reflectInto() as $method) {
            if ($method->hasAnnotation($annotation)) {
                $methods[] = $method->name();
            }
        }

        return $methods;
    }

    public function reflectInto()
    {
        $methods = (new ReflectionClass($this->reference))->getMethods();

        return array_map(function ($method){
            return new Method($method);

        }, $methods);
    }
}
