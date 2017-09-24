<?php

namespace Tests;

use josephlavin\tap\TapProxy;
use PHPUnit\Framework\TestCase;

class TapProxyTest extends TestCase
{
    /**
     * @test
     */
    function it_executes_method_on_provided_object()
    {
        $object = new FakeObject();

        $this->assertFalse($object->fooExecuted);

        TapProxy::create($object)->foo();

        $this->assertTrue($object->fooExecuted);
    }

    /**
     * @test
     */
    function it_returns_provided_object()
    {
        $object = new FakeObject();

        $returned = TapProxy::create($object)->foo();

        $this->assertSame($object, $returned);
    }
}