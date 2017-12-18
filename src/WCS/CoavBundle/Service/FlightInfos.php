<?php

namespace WCS\CoavBundle\Service;

class FlightInfos
{

    /**
     * @var string
     */
    private $unit;

    const EARTH_RADIUS = 6371;

    public function __construct($unit)
    {
        $this->unit = $unit;
    }

    /**
     *
     * Description: Distance calculation from the latitude/longitude of 2 points base on Harnive's formu;a
     * Website: http://www.codecodex.com/wiki/Calculate_Distance_Between_Two_Points_on_a_Globe
     *
     * @param $latitudeFrom
     * @param $longitudeFrom
     * @param $latitudeTo
     * @param $longitudeTo
     *
     * @return float
     */
    public function getDistance(float $latitudeFrom,float $longitudeFrom,float $latitudeTo,float $longitudeTo):float
    {

        $d = 0;
        $dLat = deg2rad($latitudeTo - $latitudeFrom);
        $dLon = deg2rad($longitudeTo - $longitudeFrom);


        $a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * sin($dLon / 2) * sin($dLon / 2);
        $c = 2 * asin(sqrt($a));


        switch ($this->unit) {
            case 'km':
                $d = $c * self::EARTH_RADIUS;
                break;
            case 'mi':
                $d = $c * self::EARTH_RADIUS / 1.609344;
                break;
            case 'nmi':
                $d = $c * self::EARTH_RADIUS / 1.852;
                break;
        }

        return $d;
    }

    /**
     * @param $cruiseSpeed
     * @param $distance
     *
     * @return float
     */
    public function getDuration(int $cruiseSpeed,float $distance)
    {
       $duration = $distance / $cruiseSpeed;
       return $duration;
    }
}