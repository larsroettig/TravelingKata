<?php

namespace TravelingKata\Tests;

use PHPUnit\Framework\TestCase;
use TravelingKata\GetPossiblyCityPerDay;

class GetPossiblyCityPerDayTest extends TestCase
{
    /**
     * @var GetPossiblyCityPerDay
     */
    private $getPossiblyCityPerDay;

    public function testTwoCitys()
    {
        $cityList = json_decode($this->getTestData(), true);
        $result = $this->getPossiblyCityPerDay->execute($cityList);
        $expetResult = array(
            1 =>
                array(
                    'Duesseldorf' => '192',
                ),
            2 =>
                array(
                    'Istanbul' => '94',
                    'Duesseldorf' => '190',
                ),
            3 =>
                array(
                    'Duesseldorf' => '205',
                    'Istanbul' => '217',
                ),
            5 =>
                array(
                    'Duesseldorf' => '151',
                    'Istanbul' => '245',
                ),
            6 =>
                array(
                    'Duesseldorf' => '78',
                    'Istanbul' => '188',
                ),
            7 =>
                array(
                    'Duesseldorf' => '74',
                    'Istanbul' => '175',
                ),
            8 =>
                array(
                    'Istanbul' => '116',
                    'Duesseldorf' => '211',
                ),
            9 =>
                array(
                    'Duesseldorf' => '189',
                    'Istanbul' => '207',
                ),
            10 =>
                array(
                    'Istanbul' => '231',
                )
        );

        $this->assertEquals($expetResult, $result);
    }

    private function getTestData()
    {
        return '[{
    "name": "Duesseldorf",
    "prices": [
      "192",
      "190",
      "205",
      "",
      "151",
      "78",
      "74",
      "211",
      "189",
      ""
    ]
  },
  {
    "name": "Istanbul",
    "prices": [
      "",
      "94",
      "217",
      "",
      "245",
      "188",
      "175",
      "116",
      "207",
      "231"
    ]
  }]';
    }

    /**
     *
     */
    protected function setUp()
    {
        $this->getPossiblyCityPerDay = new GetPossiblyCityPerDay();
    }
}