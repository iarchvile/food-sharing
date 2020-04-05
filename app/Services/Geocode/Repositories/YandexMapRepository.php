<?php


namespace App\Services\Geocode\Repositories;


class YandexMapRepository implements GeocodeInterface
{
    public function getPoint($address) :?array
    {
        $response = \Http::get(env('YANDEX_MAP_API_URL').'?apikey='.
            env('YANDEX_MAP_API_KEY').'&format=json&geocode='.$address);

        $point = \Arr::get($response, 'response.GeoObjectCollection.featureMember.0.GeoObject.Point.pos');

        if (!is_null($point)) {
            $point = explode(' ', $point);
        }

        return $point;
    }
}