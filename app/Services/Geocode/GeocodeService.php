<?php


namespace App\Services\Geocode;


use App\Services\Geocode\Repositories\GeocodeInterface;

class GeocodeService
{

    /**
     * @var GeocodeInterface
     */
    private $geocode;

    public function __construct(GeocodeInterface $geocode)
    {
        $this->geocode = $geocode;
    }


    public function getPoint($address) :?array
    {
        return $this->geocode->getPoint($address);
    }


}