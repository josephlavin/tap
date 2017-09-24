<?php

namespace josephlavin\tap;

class TapProxy
{
    /**
     * @var mixed
     */
    private $object;

    /**
     * @param $object
     * @return TapProxy
     */
    public static function create($object)
    {
        return new static($object);
    }

    /**
     * TapProxy constructor.
     * @param $object
     */
    private function __construct($object)
    {
        $this->object = $object;
    }

    /**
     * Call a method on the provided object then return the object.
     * @param $method
     * @param $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        call_user_func_array([$this->object, $method], $parameters);

        return $this->object;
    }
}