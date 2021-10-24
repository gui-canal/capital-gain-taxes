<?php

/** @var \Laravel\Lumen\Routing\Router $router */
$router->post('/', ['uses' => 'StocksController@operate']);
