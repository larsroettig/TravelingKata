<?php

include '/var/www/TravelingKata/vendor/autoload.php';

use TravelingKata\GetPossiblyCityPerDay;
use TravelingKata\GetTravelingRoutes;
use TravelingKata\Route;

$cityList = file_get_contents(__DIR__.'/simple.json');
$possiblyResults = GetPossiblyCityPerDay::execute(json_decode($cityList, true));
$routes = GetTravelingRoutes::execute($possiblyResults);

$fomat = 'Start: %s || End: %s || Price: %s € || Route: %s';
/** @var Route $route */

$lowest = array_shift($routes);
echo  PHP_EOL.'*** Result: ***' . PHP_EOL;
echo sprintf($fomat, $lowest->getName(), $lowest->getLastCity(), $lowest->getPrice(), $lowest->getCityList()) . PHP_EOL;

echo  PHP_EOL.'*** Alternatives: ***' . PHP_EOL;
foreach ($routes as $route) {
    echo sprintf($fomat, $route->getName(), $route->getLastCity(), $route->getPrice(), $route->getCityList()) . PHP_EOL;
}