<?php

use josephlavin\tap\TapProxy;

/**
 * "Tap" a method on the provided instance either by callback or proxy.
 * @param $instance
 * @param callable|null $callback
 * @return mixed
 */
function tap($instance, $callback = null)
{
    if (is_null($callback)) {
        return TapProxy::create($instance);
    }

    $callback($instance);

    return $instance;
}