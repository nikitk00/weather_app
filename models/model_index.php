<?php

require_once('model_database.php');
require_once('api_requests.php');
$link = db_connect();



//$j = file_get_contents('./resources/city.list.json', FILE_USE_INCLUDE_PATH);

$cities = array();

set_time_limit(0);


$j = file_get_contents('./resources/city.list.json', FILE_USE_INCLUDE_PATH, NULL, 0, filesize('./resources/city.list.json'));

echo "<br>"."<br>";

ini_set('memory_limit', '-1');//!!!!!!!!!!!!!warning!be carefull with it

$tmp = json_decode($j);

$cts = (array)$tmp;




//echo sizeof($cts).'<br><br>';
try{
	$d = get_forecast_by_id(1851632);
//	var_dump($d);
} catch (Exception $ex){
	echo $ex->getMessage();
}

//weather_format($d);

find_city('London');

//for($i = 0; $i <= 32; $i = $i + 8){
//echo $d->list[$i]->dt_txt.' '.$d->list[$i]->weather[0]->description.' '.($d->list[$i]->main->temp-273.15).' '.$d->list[$i]->weather[0]->icon.'<br>';
//}


//echo get_city_by_id($link, 820073)['name'].'<br>';
//echo get_city_by_name($link, 'Федоровка')['id'].'<br>';






?>