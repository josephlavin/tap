<?php

namespace Tests;

use josephlavin\tap\TapProxy;
use PHPUnit\Framework\TestCase;

class tapTest extends TestCase
{
    /**
     * @test
     */
    function it_executes_provided_callback()
    {
        $executed = false;
        $foo = function () use (&$executed) {
            $executed = true;
        };

        tap($foo, function ($foo) {
            $foo();
        });

        $this->assertTrue($executed);
    }

    /**
     * @test
     */
    function it_provides_given_variable_to_callback()
    {
        $foo = 'bar';

        $returned = tap($foo, function ($callbackFoo) use ($foo) {
            $this->assertSame($callbackFoo, $foo);
        });

        $this->assertSame($returned, $foo);
    }

    /**
     * @test
     */
    function it_returns_given_variable()
    {
        $foo = 'bar';

        $returned = tap($foo, function () {
            // do nothing...
        });

        $this->assertSame($returned, $foo);
    }

    /**
     * @test
     */
    function it_returns_proxy_when_callback_is_null()
    {
        $this->assertInstanceOf(TapProxy::class, tap('foo'));
    }
}