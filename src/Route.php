<?php

declare(strict_types=1);

namespace TravelingKata;

class Route
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var array
     */
    private $cityList = [];

    /**
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @param string $key
     * @param string $value
     * @return bool
     */
    public function add(string $key, string $value): bool
    {
        if (array_key_exists($key, $this->cityList)) {
            return false;
        }

        $this->cityList[$key] = $value;

        return true;
    }


    /**
     * @return float|int
     */
    public function getPrice()
    {
        return array_sum($this->cityList);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getLastCity()
    {
        $cityList = array_keys($this->cityList);
        return end($cityList);
    }

    /**
     * @return string
     */
    public function getCityList(): string
    {
        return http_build_query($this->cityList, '', ', ');
    }
}
