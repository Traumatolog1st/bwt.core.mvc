<?php

namespace models;

use components\Model;

class Weather extends Model
{
    public function getData()
    {
        $url = "https://www.gismeteo.ua/weather-zaporizhia-5093/";

        $out = file_get_contents($url);
        preg_match('|<div class="temp">(.*)</div>|Uis', $out, $arr);

        return $arr[0];
    }
}