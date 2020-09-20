<?php

interface Car {
    function startEngine();
    function stopEngine();
    function start();
    function stop();
}

class Route implements Car{
    private $car;

    /**
     * Route constructor.
     * @param $car
     */
    public function __construct($car)
    {
        $this->car = $car;
    }

    function startEngine()
    {
        // TODO: Implement startEngine() method.
    }

    function stopEngine()
    {
        // TODO: Implement stopEngine() method.
    }

    function start()
    {
        // TODO: Implement start() method.
    }

    function stop()
    {
        // TODO: Implement stop() method.
    }
}

