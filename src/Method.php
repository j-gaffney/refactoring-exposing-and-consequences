<?php

namespace App;

class Method
{
    protected $method;

    public function __construct(\ReflectionMethod $method)
    {
        $this->method = $method;
    }

    public function hasAnnotation($annotation)
    {
        return stristr($this->method->getDocComment(), "@{$annotation}") !== false;
    }

    public function name()
    {
        return $this->method->getName();
    }
}
