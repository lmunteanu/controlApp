<?php

$url = "http://www.accuweather.com/ro/ro/oradea/287292/weather-forecast/287292";

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //ssl quick fix

$output = curl_exec($ch);

echo $output;

curl_close($ch);