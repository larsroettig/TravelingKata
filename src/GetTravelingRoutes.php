<?php
/**
 * Created by PhpStorm.
 * User: roettigl
 * Date: 2018-11-28
 * Time: 20:58
 */

namespace TravelingKata;


class GetTravelingRoutes
{
    /**
     * @param array $cityList
     * @return array
     */
    public static function execute(array $possiblyCityPerDay)
    {
        /** @var Route[] $routes */
        $routes = [];

        $initRouts = array_shift($possiblyCityPerDay);
        $calcRouts = GetTravelingRoutes::getRouteWithStartCity($initRouts);

        foreach ($calcRouts as $calcRoute) {
            self::addCity($possiblyCityPerDay, $calcRoute);
        }


        return $calcRouts;
    }


    /**
     * @param $initRouts
     */
    private static function getRouteWithStartCity($initRouts)
    {
        $routes = [];
        foreach ($initRouts as $cityName => $price) {
            $route = new Route($cityName);
            $route->add($cityName, $price);
            $routes[] = $route;
        }

        return $routes;
    }

    /**
     * @param array $possiblyCityPerDay
     * @param $calcRoute
     */
    public static function addCity(array $possiblyCityPerDay, Route $calcRoute): void
    {
        foreach ($possiblyCityPerDay as $possiblyCites) {
            foreach ($possiblyCites as $name => $price) {
                if ($calcRoute->add($name, $price) === true) {
                    break;
                }
            }
        }
    }
}