<?php

namespace TravelingKata;

class GetPossiblyCityPerDay
{
    /**
     * @param array $cityList
     * @return array
     */
    public static function execute(array $cityList)
    {
        list($maxResultDays, $possiblyResults) = GetPossiblyCityPerDay::getPossiblyResults($cityList);
        $possiblyCityPerDay = [];
        for ($day = 1; $day <= $maxResultDays; $day++) {

            foreach ($possiblyResults as $cityName => $prices) {
                if (!isset($prices[$day])) {
                    continue;
                }

                $possiblyCityPerDay[$day][$cityName] = $prices[$day];
            }

            // sort the lowest price to first array positions
            if (isset($possiblyCityPerDay[$day])) {
                asort($possiblyCityPerDay[$day]);
            }
        }

        return $possiblyCityPerDay;
    }

    /**
     * @param array $cityList
     * @return array
     */
    private static function getPossiblyResults(array $cityList)
    {
        $possiblyResults = [];
        $maxResultDays = 0;

        foreach ($cityList as $city) {
            $day = 1;
            $prices = [];

            foreach ($city['prices'] as $price) {
                if (empty($price)) {
                    $day++;
                    continue;
                }

                $prices[$day] = $price;
                $day++;
            }

            $cityName = $city['name'];
            $possiblyResults[$cityName] = $prices;

            if ($day > $maxResultDays) {
                $maxResultDays = $day - 1;
            }
        }

        return [$maxResultDays, $possiblyResults];
    }
}
