<?php
namespace Tests\App;

use App\AnnotationReader;
use PHPUnit\Framework\TestCase;

class AnnotationReaderTest extends TestCase
{
    protected static $annotationReader;
    protected static $method;

    public static function setUpBeforeClass(): void
    {
        self::$annotationReader = new AnnotationReader(Stub::class);

        self::$method = (new \ReflectionClass(Stub::class))->getMethods()[0];
    }

    public function testFindsMethodNamesWithGivenAnnotation(): void
    {
        $methods = self::$annotationReader->having('setUp');

        $this->assertEquals(['method1'], $methods);
    }
}

class Stub
{
    /** @setUp */
    public function method1()
    {

    }

    public function method2()
    {

    }
}
