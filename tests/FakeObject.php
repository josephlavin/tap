<?php

namespace Tests;

class FakeObject
{
    public $fooExecuted = false;

    public function foo()
    {
        $this->fooExecuted = true;
    }
}