<?php
namespace tests\App;

use PHPUnit\Framework\TestCase;

use App\AnnotationReader;

class AnnotationReaderTest extends TestCase
{
    protected static $annotationReader;

    public static function setUpBeforeClass(): void
    {
        self::$annotationReader = new AnnotationReader(Stub::class);
    }

    public function testAssertTrue(): void
    {
        $this->assertTrue(true);
    }

    public function testFindsMethodNamesWithGivenAnnotation(): void
    {
        $method = self::$annotationReader->having('setUp');

        $this->assertEquals(['method1'], $method);
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
