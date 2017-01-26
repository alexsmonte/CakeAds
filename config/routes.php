<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::plugin('CakeAds',['path' => '/ads'],
    function (RouteBuilder $routes) {
        $routes->connect('/', ['controller' => 'Ads', 'action' => 'index', 'plugin' =>'CakeAds']);

        $routes->fallbacks(DashedRoute::class);
    }
);
