<?php
namespace tests\App;

use App\Method;
use PHPUnit\Framework\TestCase;
use Tests\App\Stub;

class MethodTest extends TestCase
{
    protected static $method;

    public static function setUpBeforeClass(): void
    {
        $stubMethod = (new \ReflectionClass(Stub::class))->getMethods()[0];

        self::$method = new Method($stubMethod);
    }

    public function testChecksForAnnotationInDocBlock(): void
    {
        $this->assertTrue(self::$method->hasAnnotation('setUp'));
    }

    public function testGetsTheNameOfMethod(): void
    {
        $this->assertEquals('method1', self::$method->name('method1'));
    }
}
